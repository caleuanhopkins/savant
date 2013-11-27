<?php
	require_once('index.php');
	class Posts extends Adminpanel{

		public function __construct(){
			parent::__construct();
			if(!empty($_GET['action'])){
				switch ($_GET['action']){
					case 'create':
						$this->addpost();
						break;
					default:
						$this->listposts();
						break;
					case 'save':
						$this->savepost();
						break;
					case 'edit':
						$this->editposts();
						break;
					case 'update':
						$this->updatepost();
						break;
					case 'delete':
						$this->deletepost();
						break;
				}
			}else{
				$this->listposts();
			}
		}

		public function listposts(){
			$posts = $this->ksdb->dbselect('posts', array('*'));
			require_once('templates/manageposts.php');
		}

		public function editposts(){
			if(!empty($_GET['id']) && is_numeric($_GET['id'])){
				$post = $this->ksdb->dbselect('posts', array('*'), array('id' => $_GET['id']));
				if(!empty($post) && $post > 0){
					require_once('templates/editpost.php');
				}else{
					header("Location: http://".$_SERVER['SERVER_NAME']."/admin/posts.php?status=error");
				}
			}
		}

		public function addpost(){
			require_once('templates/newpost.php');
		}

		public function savepost(){
			$status= '';
			$array = $format = array();
			if(!empty($_POST['post'])){
				$post = $_POST['post'];
			}
			if(!empty($post['content'])){
				$array['content'] = $post['content'];
				$format[] = ':content'; 
			}
			if(!empty($post['title'])){
				$array['title'] = $post['title'];
				$format[] = ':title'; 
			} 
			if(!empty($post['fimg'])){
				$array['title'] = $post['fimg'];
				$format[] = ':fimg'; 
			}
			$array['date'] = time();
			$format[] = ':date'; 
			$add = $this->ksdb->dbadd('posts', $array, $format);
			if(!empty($add) && $add > 0){
				$status = array('success' => 'Your post has been saved successfully.');
				$key = 'success';
			}else{
				$status = array('error' => 'There has been an error saving your post. Please try again later.');
				$key = 'error';
			}
			header("Location: http://".$_SERVER['SERVER_NAME']."/admin/posts.php?status=".$key);
		}
		
		public function updatepost(){
			$status= '';
			$array = $format = array();
			if(!empty($_POST['post'])){
				$post = $_POST['post'];
			}
			if(!empty($post['content'])){
				$array['content'] = $post['content'];
			}
			if(!empty($post['title'])){
				$array['title'] = $post['title'];
			}
			if(!empty($post['fimg'])){
				$array['fimg'] = $post['fimg'];
			}
			
			$add = $this->ksdb->dbupdate('posts', $array, array('id' => $post['id']));
			if(!empty($add) && $add > 0){
				$status = array('success' => 'Your post has been saved successfully.');
				$key = 'success';
			}else{
				$status = array('error' => 'There has been an error saving your post. Please try again later.');
				$key = 'error';
			}
			header("Location: http://".$_SERVER['SERVER_NAME']."/admin/posts.php?status=".$key);
		}

		public function deletepost(){
			if(!empty($_GET['id']) && is_numeric($_GET['id'])){
				$delete = $this->ksdb->dbdelete('posts', array('id' => $_GET['id']));
				if(!empty($delete) && $delete > 0){
					header("Location: http://".$_SERVER['SERVER_NAME']."/admin/posts.php?delete=success");
				}else{
					header("Location: http://".$_SERVER['SERVER_NAME']."/admin/posts.php?delete=error");
				}
			}
		}

	}

	$admin_posts = new Posts;