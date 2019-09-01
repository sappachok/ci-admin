<?php
class MY_Migration extends CI_Migration {

	public function set_batch($cols, $values) {
		$insert_data = Array();

		foreach($values as $rno => $row) {
			foreach($cols as $cno => $colval) {
				$insert_data[$rno][$colval] = $row[$cno];
			}
		}
		return $insert_data;
	}

	public function add_model($name, $param) {
		$insert_data = Array(
			"name"=>$name,
			"param"=>json_encode($param)
		);
		$this->db->insert('models', $insert_data);
	}

	public function remove_model($name) {
		$this->db->delete('models', Array("name"=>$name));
	}
}