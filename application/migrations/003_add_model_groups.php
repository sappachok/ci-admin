<?php
class Migration_add_model_groups extends MY_Migration {

    public function up() {
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'INT',
                'unsigned' => TRUE,
                'auto_increment' => TRUE,
                'null' => FALSE
            ),
            'model' => array(
                'type' =>'VARCHAR',
                'constraint' => '200',
                'null' => FALSE
            ),
            'group' => array(
                'type' =>'VARCHAR',
                'constraint' => '200',
                'null' => FALSE
            ),
            'label' => array(
                'type' =>'VARCHAR',
                'constraint' => '200',
                'null' => FALSE
            ),
            'order' => array(
                'type' => 'INT',
                'unsigned' => TRUE,
                'null' => TRUE
            ),
        ));

        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('model_groups', true); 
    }

    public function down() {
		$this->db->empty_table('model_groups');
        $this->dbforge->drop_table('model_groups', TRUE);
    }

	public function insert_data() {

	}
}

?>