<?php
class Migration_add_posts extends MY_Migration {

    public function up() {
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'INT',
                'unsigned' => TRUE,
                'auto_increment' => TRUE,
                'null' => FALSE
            ),
			"`title` varchar(200) NOT NULL",
			"`short_detail` varchar(500) NOT NULL",
			"`detail` text NOT NULL",
        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('posts', true); 
		$this->insert_data();
		
		$this->add_model("post", Array(
					"label" => "Posts",
					"fields" => Array(
						"title" => Array(
							"type" => "text"
						)
					)
				)
			);
    }

    public function down() {
		//$this->db->empty_table('users_groups');
        $this->dbforge->drop_table('posts', TRUE);
    }

	public function insert_data() {

	}
}

?>