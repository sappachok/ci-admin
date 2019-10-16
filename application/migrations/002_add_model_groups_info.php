<?php
class Migration_add_model_groups_info extends MY_Migration {

    public function up() {
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'INT',
                'unsigned' => TRUE,
                'auto_increment' => TRUE,
                'null' => FALSE
            ),
            'name' => array(
                'type' =>'VARCHAR',
                'constraint' => '200',
				'unique' => TRUE,
                'null' => FALSE
            ),
			"`param` text NOT NULL",
        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('model_groups_info', true); 
    }

    public function down() {
		$this->db->empty_table('model_groups_info');
		$this->dbforge->drop_table('model_groups_info', TRUE);
    }

	public function insert_data() {

	}
}

?>