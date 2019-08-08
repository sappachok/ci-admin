<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class CI_Mycrud {

    public $fields_set = "";
    public $form_submit_bar = "";

	public function __construct($config = array())
	{
		empty($config) OR $this->initialize($config);
		log_message('info', 'Mycrud Class Initialized');
    }
    
    public function test()
    {
        echo "test";
    }

    public function fields_set($data="")
    {
        $this->fields_set = $data;
    }

    public function form_submit_bar() {
        return $this->form_submit_bar;
    }

    public function add_form_submit($data)
    {
        $this->form_submit_bar .= "<button type='submit'
            name='".$data["name"]."'
            class='".$data["class"]."'>".$data["label"]."</button>";
    }

    public function add_form_button($data)
    {
        $this->form_submit_bar .= "<button type='button'
            name='".$data["name"]."'
            class='".$data["class"]."'>".$data["label"]."</button>";
    }


    public function form_generate()
    {
        $form_gen = "";
        foreach($this->fields_set as $ind => $field) {
            if($field["type"]=="text") {
                $form_gen .= "<p>".$this->form_input($ind, $field)."</p>";
            } else if($field["type"]=="textarea") {
                $form_gen .= "<p>".$this->form_textarea($ind, $field)."</p>";
            } else {

            }
        }

        $form_gen .= $this->form_submit_bar();
        return $form_gen;
    }

    public function form_textarea($id, $config)
    {
        if(@$config["value"]) $value = $config["value"];
        else $value = "";

        $input = "<div><label>".$config["label"]."</label></div>";
        $input .= "<textarea id='".$id."' name='".$config["name"]."' class='form-control'>".$value."</textarea>";
        return $input;        
    }

    public function form_input($id, $config)
    {
        if(@$config["value"]) $value = $config["value"];
        else $value = "";

        $input = "<div><label>".$config["label"]."</label></div>";
        $input .= "<input type='text' id='".$id."' name='".$config["name"]."' value='".$value."' class='form-control'>";
        return $input;
    }

    public function form_submit()
    {

    }

    public function form_button()
    {

    }    

}

?>