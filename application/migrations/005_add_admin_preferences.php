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
        $this->insert_data();
    }

    public function down() {
        //$this->db->empty_table('users_groups');
        $this->db->empty_table('admin_preferences');
        $this->dbforge->drop_table('admin_preferences', TRUE);
    }

	public function insert_data() {
		$insert_data = Array();
		$insert_data = $this->set_batch(
			Array("id", "user_panel", "sidebar_form", "messages_menu", "notifications_menu", "tasks_menu", "user_menu", "ctrl_sidebar", "transition_page"),
			Array(
				Array(1, 0, 0, 0, 0, 0, 1, 0, 0)
			)
		);

        $this->db->insert_batch('admin_preferences', $insert_data);
	}
}

?>