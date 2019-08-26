<?php
class Migration_add_admin_preferences extends MY_Migration {

    public function up() {
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'INT',
                'unsigned' => TRUE,
                'auto_increment' => TRUE,
                'null' => FALSE
            ),
			"`user_panel` tinyint(1) NOT NULL DEFAULT '0'",
			"`sidebar_form` tinyint(1) NOT NULL DEFAULT '0'",
			"`messages_menu` tinyint(1) NOT NULL DEFAULT '0'",
			"`notifications_menu` tinyint(1) NOT NULL DEFAULT '0'",
			"`tasks_menu` tinyint(1) NOT NULL DEFAULT '0'",
			"`user_menu` tinyint(1) NOT NULL DEFAULT '1'",
			"`ctrl_sidebar` tinyint(1) NOT NULL DEFAULT '0'",
			"`transition_page` tinyint(1) NOT NULL DEFAULT '0'"
        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('admin_preferences', true); 
    }

    public function down() {
		//$this->db->empty_table('users_groups');
        $this->dbforge->drop_table('admin_preferences', TRUE);
    }

	public function insert_data() {

	}
}

?>