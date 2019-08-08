<?php
class Migration_add_login_attempts extends CI_Migration {

    public function up() {
        $this->dbforge->add_field(array(
			'id' => array(
				'type' => 'INT',
				'unsigned' => TRUE,
				'auto_increment' => TRUE,
				'null' => FALSE
			),
			"`ip_address` varchar(15) NOT NULL",
			"`login` varchar(100) NOT NULL",
			"`time` int(11) UNSIGNED DEFAULT NULL",
        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('login_attempts', true);      
    }

    public function down() {
        $this->dbforge->drop_table('login_attempts', TRUE);
    }
}
?>