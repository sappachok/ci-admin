<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Template {

    protected $CI;

    public function __construct()
    {	
		$this->CI =& get_instance();
		//$this->CI =& get_instance()->controller;
    }


    public function admin_render($content, $data = NULL)
    {
        if ( ! $content)
        {
            return NULL;
        }
        else
        {
            $this->template['header']          = $this->CI->load->view('admin/_templates/header', $data, TRUE);
            $this->template['main_header']     = $this->CI->load->view('admin/_templates/main_header', $data, TRUE);
            $this->template['main_sidebar']    = $this->CI->load->view('admin/_templates/main_sidebar', $data, TRUE);
            if(@$data["debug"]) $this->template['debug']           = $this->CI->load->view('admin/_templates/main_debug', $data, TRUE);
            $this->template['content']         = $this->CI->load->view($content, $data, TRUE);
            $this->template['control_sidebar'] = $this->CI->load->view('admin/_templates/control_sidebar', $data, TRUE);
            $this->template['footer']          = $this->CI->load->view('admin/_templates/footer', $data, TRUE);

            echo $this->CI->load->view('admin/_templates/template', $this->template, TRUE);
        }
	}


    public function auth_render($content, $data = NULL)
    {
        if ( ! $content)
        {
            return NULL;
        }
        else
        {
            $this->template['header']  = $this->CI->load->view('auth/_templates/header', $data, TRUE);
            $this->template['content'] = $this->CI->load->view($content, $data, TRUE);
            $this->template['footer']  = $this->CI->load->view('auth/_templates/footer', $data, TRUE);

            return $this->CI->load->view('auth/_templates/template', $this->template);
        }
	}

}