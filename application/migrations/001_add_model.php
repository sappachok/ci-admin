<?php
class Migration_add_model extends MY_Migration {

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
        $this->dbforge->create_table('model', true); 
    }

    public function down() {
		$this->db->empty_table('model');
        $this->dbforge->drop_table('model', TRUE);
    }

	public function insert_data() {

	}
}

?>