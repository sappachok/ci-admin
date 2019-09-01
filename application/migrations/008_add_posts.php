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
			"`category` int(10) NOT NULL",
			"`short_detail` varchar(500) NOT NULL",
			"`detail` text NOT NULL",
        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('posts', true); 
		$this->insert_data();
		
		$this->add_model("posts", Array(
					"label" => "Posts",
					"icon" => "fa fa-pencil",
					"fields" => Array(
						"title" => Array(
							"name" => "title",
							"label" => "Title",
							"type" => "text",
							"required" => true
						),
						"category" => Array(
							"name" => "category",
							"label" => "Category",
							"type" => "select",
						),						
						"short_detail" => Array(
							"name" => "short_detail",
							"label" => "Short detail",
							"type" => "textarea",
							"required" => true
						),
						"detail" => Array(
							"name" => "detail",
							"label" => "Detail",
							"type" => "textarea",
							"required" => true
						),												
					)
				)
			);
    }

    public function down() {
		$this->remove_model("posts");
		$this->db->empty_table('posts');
        $this->dbforge->drop_table('posts', TRUE);
    }

	public function insert_data() {

	}
}

?>