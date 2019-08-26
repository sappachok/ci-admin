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
}