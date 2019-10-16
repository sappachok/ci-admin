<?php
class Migration_add_public_preferences extends MY_Migration {

    public function up() {
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'INT',
                'unsigned' => TRUE,
                'auto_increment' => TRUE,
                'null' => FALSE
            ),
			"`transition_page` tinyint(1) NOT NULL DEFAULT '0'"
        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('public_preferences', true); 
		$this->insert_data();
    }

    public function down() {
		//$this->db->empty_table('users_groups');
        $this->dbforge->drop_table('public_preferences', TRUE);
    }

	public function insert_data() {
		$insert_data = Array();
		$insert_data = $this->set_batch(
			Array("id", "transition_page"),
			Array(
				Array(1, 0),
			)
		);

		$this->db->insert_batch('public_preferences', $insert_data);
	}
}

?>