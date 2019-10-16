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
							"label" => thutf8("����ͧ"),
							"type" => "text",
							"required" => true
						),
						"category" => Array(
							"name" => "category",
							"label" => thutf8("��Ǵ����"),
							"type" => "select",
						),						
						"short_detail" => Array(
							"name" => "short_detail",
							"label" => thutf8("���������"),
							"type" => "textarea",
							"required" => true
						),
						"detail" => Array(
							"name" => "detail",
							"label" => thutf8("�����Ң���"),
							"type" => "textarea",
							"required" => true
						),
						"status" => Array(
							"name" => "status",
							"label" => thutf8("ʶҹ�"),
							"type" => "select",
							"options" => Array(
								'' => thutf8("���͡"),
								'P' => thutf8("�����"),
								'D' => thutf8("��ҧ"),
								'N' => thutf8("��������"),
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