<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Control_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

	public function register()
	{

	}

	public function regist_models()
	{
		$result = $this->db->get("models")->result();
		$data = Array();
		foreach($result as $no => $res) {
			$params = json_decode($res->param);
			$data[$no] = new stdClass();
			$data[$no]->name = $res->name;
			$data[$no]->params = $params;

		}
		return $data;
	}

	public function get_model($name)
	{
		$this->db->where(Array("name"=>$name));
		$row = $this->db->get("models")->row();
		$data = Array(
			"name" => $row->name,
			"params" => json_decode($row->param)
		);
		return (object) $data;
	}

	public function get_lists($tname)
	{
		$result = $this->db->get($tname)->result();
		return $result;
	}

	public function insert($table, $data)
	{
		if($this->db->insert($table, $data)) {
			return true;
		} else {
			return false;
		}
	}

}
