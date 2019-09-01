<?php
class Migration_add_models extends MY_Migration {

    public function up() {
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'INT',
                'unsigned' => TRUE,
                'auto_increment' => TRUE,
                'null' => FALSE
            ),
			"`name` varchar(15) NOT NULL",
			"`param` text NOT NULL",
        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('models', true); 
    }

    public function down() {
		$this->db->empty_table('models');
        $this->dbforge->drop_table('models', TRUE);
    }

	public function insert_data() {

	}
}

?>