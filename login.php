<?php session_start();
	require_once('includes/database.php');
	class Login{
		public $ksdb = '';
		public $base = '';
		public function __construct(){
			$this->ksdb = new Database;
			$this->base = (object) '';
			$this->base->url = "http://".$_SERVER['SERVER_NAME'];
			$this->index();
		}
		public function index(){
			if(!empty($_GET['status']) && $_GET['status'] == 'logout'){
				session_unset();
				session_destroy();
				$error = 'You have been logged out. Please login again.';
				require_once('admin/templates/loginform.php');
			}else if(!empty($_SESSION['kickstart_login']) && $_SESSION['kickstart_login'] = true){
				header('Location: http://'.$_SERVER['SERVER_NAME'].'/admin/index.php?error=already%20logged%20in');
				exit();
			}else{
				if($_SERVER['REQUEST_METHOD'] === 'POST'){
					$this->validatedetails();
				}else if(!empty($_GET['status'])){
					if($_GET['status'] == 'inactive'){
						session_unset();
						session_destroy();
						$error = 'You have been logged out due to inactivity. Please login again.';
					}
				}
				require_once('admin/templates/loginform.php');
			}
		}
		public function loginsuccess(){
			$_SESSION['kickstart_login'] = true;
			$_SESSION["timeout"] = time();
			header('Location: http://'.$_SERVER['SERVER_NAME'].'/admin/posts.php');
			return;
		}
		public function loginfail(){
			return 'Your Username/Password was incorrect';
		}
		private function validatedetails(){
			if(!empty($_POST['username']) && !empty($_POST['password'])){
				$password = md5($_POST['password']);
				$login = $this->ksdb->dbselect('users', array('*'),array('username' => $_POST['username'], 'password' => $password));
				if(!empty($login) && is_array($login) && !empty($login[0])){
					$this->loginsuccess();
				}else{
					echo $error = $this->loginfail();
				}
			}
		}

	}
	$login = new Login();