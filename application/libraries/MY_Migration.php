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
			"param"=>json_encode($param, JSON_UNESCAPED_UNICODE)
		);
		$this->db->insert('models', $insert_data);
	}

	public function remove_model($name) {
		$this->db->delete('models', Array("name"=>$name));
	}

	public function add_model_group($name, $param) {
		$insert_data = Array(
			"name"=>$name,
			"param"=>json_encode($param)
		);
		$this->db->insert('model_groups_info', $insert_data);
	}

	public function remove_model_group($name) {
		$this->db->delete('model_groups_info', Array("name"=>$name));
	}

	public function group_add_model($model, $group, $label, $order=0) {
		$insert_data = Array(
			"model"=>$model,
			"group"=>$group,
			"label"=>$label,
			"order"=>$order,
		);
		$this->db->insert('model_groups', $insert_data);
	}

	public function group_remove_model($model, $group) {
		$this->db->delete('model_groups', Array("model"=>$model, "group"=>$group));
	}

}