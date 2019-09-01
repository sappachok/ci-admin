<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Control extends Admin_Controller {

    public $model = "";
    public $model_info = Array();
    public function __construct()
    {
        parent::__construct();

        /* Load :: Common */
        $this->load->model('admin/control_model');
        $this->load->helper('form');
        if(!$this->model) return false;
    }

    public function _remap($model, $method)
    {
        if($model=="index") return false;

        $this->model = $model;
        //var_dump($method);
        $this->model_info = $this->control_model->get_model($model);
        $this->page_title->push($this->model_info->params->label);
        $this->data['pagetitle'] = $this->page_title->show();

        /* Breadcrumbs :: Common */
        $this->breadcrumbs->unshift(1, $model, 'admin/control/'.$model);    

        if($method) {
            $param = Array();
            foreach($method as $no => $mthod) {
                if($no==0) {
                    $method_name = $mthod;
                } else {
                    $param[] = $mthod;
                }
            }
            //$this->$method_name($param);
            /* Title Page :: Common */                
            call_user_func_array(array($this, $method_name), $param);
        }
        else
        {
            $this->index();
        }
    }

    public function index()
    {
		if ( ! $this->ion_auth->logged_in() OR ! $this->ion_auth->is_admin())
		{
			redirect('auth/login', 'refresh');
		}
		else
		{
            //$this->data['debug'][] = $this->model_info;
			/* Breadcrumbs */
			$this->data['breadcrumb'] = $this->breadcrumbs->show();
            $this->data['pagetitle'] = $this->page_title->show();
            /* Load Template */
            $header = array();
            foreach($this->model_info->params->fields as $inp => $val) {
                $header[$val->name] = $val->label;
            }

            $this->data['header'] = $header;

            $this->data['action'] = Array(
                "create" => site_url("admin/control/".$this->model."/create"),
                "view" => site_url("admin/control/".$this->model."/view"),
                "edit" => site_url("admin/control/".$this->model."/edit"),
            );

            $this->data['lists'] = $this->control_model->get_lists($this->model);
			$this->template->admin_render('admin_control/index', $this->data);
		}
    }

    public function create()
    {
		if ( ! $this->ion_auth->logged_in() OR ! $this->ion_auth->is_admin())
		{
			redirect('auth/login', 'refresh');
		}
		else
		{
            //$this->data['debug'][] = $this->model_info;
            /* Breadcrumbs */
            $this->breadcrumbs->unshift(2, 'Create', 'admin/control/'.$this->model);
			$this->data['breadcrumb'] = $this->breadcrumbs->show();
            $this->data['pagetitle'] = $this->page_title->show();
            /* Load Template */

            if($this->model_info->params->fields)
            foreach($this->model_info->params->fields as $inp) {
                $rules = "";
                if(@$inp->required==true) $rules = 'required';

                $this->form_validation->set_rules($inp->name, $inp->label, $rules);
            }
    
            if (isset($_POST) && ! empty($_POST))
            {
                if ($this->_valid_csrf_nonce() === FALSE)
                {
                    show_error($this->lang->line('error_csrf'));
                }
    
                if ($this->form_validation->run() == TRUE)
                {
                    $data = array();
                    foreach($this->model_info->params->fields as $inp) {
                        $data[$inp->name] = $this->input->post($inp->name);
                    }

                    if($this->control_model->insert($this->model, $data))
                    {
                        //$this->session->set_flashdata('message', $this->ion_auth->messages());
                        redirect('admin/control/'.$this->model, 'refresh');
                    }
                    else
                    {
                        redirect('admin/control/'.$this->model, 'refresh');
                    }
    
                }
            }

            $this->data['csrf'] = $this->_get_csrf_nonce(); 

            if($this->model_info->params->fields)
            foreach($this->model_info->params->fields as $inp) {
                $this->data['form_input'][] = Array(
                    'label' => $inp->label,
                    'name'  => $inp->name,
                    'id'    => $inp->name,
                    'type'  => $inp->type,
                    'class' => 'form-control',
                    'value' => $this->form_validation->set_value($inp->name)
                );
            }
            
            $this->data['action'] = Array(
                "cancel" => site_url("admin/control/".$this->model),
            );            

			$this->template->admin_render('admin_control/create', $this->data);
		}
    }

    public function edit()
    {

    }

    public function view()
    {

    }   

    public function delete()
    {

    }    

	public function _get_csrf_nonce()
	{
		$this->load->helper('string');
		$key   = random_string('alnum', 8);
		$value = random_string('alnum', 20);
		$this->session->set_flashdata('csrfkey', $key);
		$this->session->set_flashdata('csrfvalue', $value);

		return array($key => $value);
	}


	public function _valid_csrf_nonce()
	{
		if ($this->input->post($this->session->flashdata('csrfkey')) !== FALSE && $this->input->post($this->session->flashdata('csrfkey')) == $this->session->flashdata('csrfvalue'))
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}    
}
