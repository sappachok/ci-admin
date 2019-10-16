<?php
class Migration_add_users extends MY_Migration {

    public function up() {
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'INT',
                'unsigned' => TRUE,
                'auto_increment' => TRUE,
                'null' => FALSE
            ),
			"`ip_address` varchar(15) NOT NULL",
			"`username` varchar(100) NOT NULL",
			"`password` varchar(255) NOT NULL",
			"`salt` varchar(255) DEFAULT NULL",
			"`email` varchar(100) NOT NULL",
			"`activation_code` varchar(40) DEFAULT NULL",
			"`forgotten_password_code` varchar(40) DEFAULT NULL",
			"`forgotten_password_time` int(11) UNSIGNED DEFAULT NULL",
			"`remember_code` varchar(40) DEFAULT NULL",
			"`created_on` int(11) UNSIGNED NOT NULL",
			"`last_login` int(11) UNSIGNED DEFAULT NULL",
			"`active` tinyint(1) UNSIGNED DEFAULT NULL",
			"`first_name` varchar(50) DEFAULT NULL",
			"`last_name` varchar(50) DEFAULT NULL",
			"`company` varchar(100) DEFAULT NULL",
			"`phone` varchar(20) DEFAULT NULL"
        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('users', true); 

		$this->insert_data();
    }

    public function down() {
		$this->db->empty_table('users');
        $this->dbforge->drop_table('users', TRUE);
    }

	public function insert_data() {
		$insert = Array("ip_address", "username", "password", "salt", "email", "activation_code", "forgotten_password_code", "forgotten_password_time", "remember_code", "created_on", "last_login", "active", "first_name", "last_name", "company", "phone");

		$values = Array(
			Array('127.0.0.1', 'administrator', '$2a$07$SeBknntpZror9uyftVopmu61qg0ms8Qv1yV6FG.kQOSM.9QhmTo36', '', 'admin@admin.com', '', NULL, NULL, NULL, 1268889823, NULL, 1, 'Admin', 'istrator', 'ADMIN', '0')
		);

		$insert_data = Array();
		$insert_data = $this->set_batch($insert, $values);

		$this->db->insert_batch('users', $insert_data);
	}
}

?>