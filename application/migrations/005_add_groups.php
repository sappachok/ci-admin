<?php
class Migration_add_groups extends MY_Migration {

    public function up() {
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'INT',
                'unsigned' => TRUE,
                'auto_increment' => TRUE,
                'null' => FALSE
            ),
			"`name` varchar(20) NOT NULL",
			"`description` varchar(100) NOT NULL",
			"`bgcolor` char(7) NOT NULL DEFAULT '#607D8B'"
        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('groups', true); 
		$this->insert_data();
    }

    public function down() {
		//$this->db->empty_table('users_groups');
        $this->dbforge->drop_table('groups', TRUE);
    }

	public function insert_data() {
		$insert_data = Array();
		$insert_data = $this->set_batch(Array("id", "name", "description", "bgcolor"),
			Array(
				Array(1, 'admin', 'Administrator', '#F44336'),
				Array(2, 'members', 'General User', '#2196F3')
			)
		);

		$this->db->insert_batch('groups', $insert_data);
	}
}

?>