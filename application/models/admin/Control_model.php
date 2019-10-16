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

	public function regist_group_model()
	{
		$result = $this->db->get("model_groups_info")->result();
		$this->db->order_by("order");
		$model_group = $this->db->get("model_groups")->result();

		$model_group_data = Array();
		foreach($model_group as $no => $val) {
			$model_group_data[$val->group][$no] = $val;
		}

		$data = Array();
		foreach($result as $no => $res) {
			$params = json_decode($res->param);
			$data[$no] = new stdClass();
			$data[$no]->name = $res->name;
			$data[$no]->params = $params;

			if(@$model_group_data[$res->name]) {
				$data[$no]->model = $model_group_data[$res->name];
			} else {

			}
		}

		return $data;
	}

	public function get_model($name)
	{
		$this->db->where(Array("name"=>$name));
		$row = $this->db->get("models")->row();
		if($row) {
			$data = Array(
				"name" => $row->name,
				"params" => json_decode($row->param)
			);
		} else {
			return false;
		}
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

	public function update($table, $data, $where="")
	{
		if($this->db->update($table, $data, $where)) {
			return true;
		} else {
			return false;
		}
	}

	public function get_record_once($model, $where="")
	{
		$this->db->where($where);
		$row = $this->db->get($model)->row();
		return $row;
	}

}
