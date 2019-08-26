<?php
class Migration_add_users_groups extends MY_Migration {

    public function up() {
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'INT',
                'unsigned' => TRUE,
                'auto_increment' => TRUE,
                'null' => FALSE
            ),
			"`user_id` int(11) UNSIGNED NOT NULL",
			"`group_id` mediumint(8) UNSIGNED NOT NULL"
        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('users_groups', true); 
		$this->insert_data();
    }

    public function down() {
		//$this->db->empty_table('users_groups');
        $this->dbforge->drop_table('users_groups', TRUE);
    }

	public function insert_data() {
		$insert = Array("id", "user_id", "group_id");

		$values = Array(
			Array(1, 1, 1)
		);

		$insert_data = Array();
		$insert_data = $this->set_batch($insert, $values);

		$this->db->insert_batch('users_groups', $insert_data);
	}
}

?>