<?php
class Migration_add_users extends CI_Migration {

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
			"`phone` varchar(20) DEFAULT NULL",
        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('users', true);      
    }

    public function down() {
        $this->dbforge->drop_table('users', TRUE);
    }
}

/*
DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(15) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) UNSIGNED DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) UNSIGNED NOT NULL,
  `last_login` int(11) UNSIGNED DEFAULT NULL,
  `active` tinyint(1) UNSIGNED DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
*/
?>