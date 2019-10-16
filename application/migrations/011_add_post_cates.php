<?php
class Migration_add_post_cates extends MY_Migration {

    public function up() {
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'INT',
                'unsigned' => TRUE,
                'auto_increment' => TRUE,
                'null' => FALSE
			),
			"`name` varchar(200) NOT NULL",
			"`category_parent` int(10)",
			"status varchar(10) NOT NULL",
        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('post_cates', true); 
		$this->insert_data();
		
		$this->add_model("post_cates", Array(
					"label" => "Posts",
					"icon" => "fa fa-pencil",
					"fields" => Array(
						"name" => Array(
							"name" => "name",
							"label" => "Name",
							"type" => "text",
							"required" => true
						),
						"category_parent" => Array(
							"name" => "category_parent",
							"label" => "Category Parent",
							"type" => "select",
						),						
						"status" => Array(
							"name" => "status",
							"label" => "Status",
							"type" => "select",
						),						
					)
				)
			);

		$this->group_add_model('post_cates', 'posts_group', 'Post Categories', 2);
    }

    public function down() {
		$this->remove_model("post_cates");
		$this->group_remove_model("post_cates", "posts_group");

		$this->db->empty_table('post_cates');
        $this->dbforge->drop_table('post_cates', TRUE);
    }

	public function insert_data() {

	}
}

?>