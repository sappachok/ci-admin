<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends Admin_Controller {

	public function __construct()
	{
		parent::__construct();

		/* Load :: Common */
		$this->lang->load('admin/users');
		
		$this->load->library("mycrud");
		/* Title Page :: Common */
		$this->page_title->push(lang('menu_users'));
		$this->data['pagetitle'] = $this->page_title->show();

		/* Breadcrumbs :: Common */
		$this->breadcrumbs->unshift(1, lang('menu_users'), 'admin/users');
    }

	public function index()
	{
		if ( ! $this->ion_auth->logged_in() OR ! $this->ion_auth->is_admin())
		{
			redirect('auth/login', 'refresh');
		}
		else
		{
			/* Breadcrumbs */
			$this->data['breadcrumb'] = $this->breadcrumbs->show();

			/* Get all users */
			$this->data['users'] = $this->ion_auth->users()->result();
			foreach ($this->data['users'] as $k => $user)
			{
				$this->data['users'][$k]->groups = $this->ion_auth->get_users_groups($user->id)->result();
			}

			/* Load Template */
			$this->template->admin_render('admin/pages/index', $this->data);
		}
	}

	public function edit()
	{
		if ( ! $this->ion_auth->logged_in() OR ! $this->ion_auth->is_admin())
		{
			redirect('auth/login', 'refresh');
		}
		else
		{
			/* Breadcrumbs */
			$this->data['breadcrumb'] = $this->breadcrumbs->show();

			/* Get all users */
			$this->data['users'] = $this->ion_auth->users()->result();
			foreach ($this->data['users'] as $k => $user)
			{
				$this->data['users'][$k]->groups = $this->ion_auth->get_users_groups($user->id)->result();
			}
			
			// $this->data['debug'] = "test"; //$this->mycrud->test();
			$this->mycrud->fields_set(Array(
				"id" => Array(
					"type"=>"text",
					"name"=>"id",
					"label"=>"รหัส",
					"class"=>"form-control",
					"rule"=>Array(
						"maxlenght"=>10,
						"required"=>true
					),
					"value"=>""
				),
				"title" => Array(
					"type"=>"text",
					"name"=>"title",
					"label"=>"เรื่อง",
					"class"=>"form-control",
					"rule"=>Array(
						"required"=>true
					),
					"value"=>"xxxx"
				),
				"page_content" => Array(
					"type"=>"textarea",
					"name"=>"page_content",
					"label"=>"รายละเอียด",
					"class"=>"form-control",
					"rule"=>Array(
						"required"=>true
					),
					"value"=>"yyyy"
				),								
			));

			$this->mycrud->add_form_submit(Array(
				"name"=>"save",
				"label"=>"Save",
				"class"=>"btn btn-primary"
			));
			$this->mycrud->add_form_button(Array(
				"type"=>"button",
				"name"=>"Cancel",
				"label"=>"Cancel",
				"onclick"=>"",
				"anchor"=>"",
				"class"=>"btn btn-default"
			));

			$this->data["form"] = $this->mycrud->form_generate();

			/* Load Template */
			$this->template->admin_render('admin/pages/form', $this->data);
		}
	}
    
}

?>