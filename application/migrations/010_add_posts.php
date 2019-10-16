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
			"`status` varchar(3) NOT NULL DEFAULT 'D'",
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
							"label" => thutf8("เรื่อง"),
							"type" => "text",
							"required" => true
						),
						"category" => Array(
							"name" => "category",
							"label" => thutf8("หมวดหมู่"),
							"type" => "select",
						),						
						"short_detail" => Array(
							"name" => "short_detail",
							"label" => thutf8("เนื้อหาย่อ"),
							"type" => "textarea",
							"required" => true
						),
						"detail" => Array(
							"name" => "detail",
							"label" => thutf8("เนื้อหาข่าว"),
							"type" => "textarea",
							"required" => true
						),
						"status" => Array(
							"name" => "status",
							"label" => thutf8("สถานะ"),
							"type" => "select",
							"options" => Array(
								'' => thutf8("เลือก"),
								'P' => thutf8("เผยแพร่"),
								'D' => thutf8("ร่าง"),
								'N' => thutf8("ไม่เผยแพร่"),
							)
						),
					)
				)
			);

		$this->add_model_group('posts_group', Array("label"=>"Posts"));
		$this->group_add_model('posts', 'posts_group', 'Post List', 1);
    }

    public function down() {
		$this->remove_model("posts");
		$this->group_remove_model("posts", "posts_group");
		$this->remove_model_group('posts_group');

		$this->db->empty_table('posts');
        $this->dbforge->drop_table('posts', TRUE);
    }

	public function insert_data() {

	}
}

?>