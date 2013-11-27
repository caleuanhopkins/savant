<?php session_start();
	require_once('../includes/database.php');
	class Adminpanel{
		public function __construct(){
			$inactive = 600;
			if (isset($_SESSION["kickstart_login"])) {
			    $sessionTTL = time() - $_SESSION["timeout"];
			    if ($sessionTTL > $inactive) {
			    	session_unset();
			        session_destroy();
			        header("Location: http://".$_SERVER['SERVER_NAME']."/login.php?status=inactive");
			    }
			}
			$_SESSION["timeout"] = time();
			if(!empty($_SESSION['kickstart_login'])){
				$login = $_SESSION['kickstart_login'];
			}
			if(empty($login)){
				session_unset();
				session_destroy();
				header('Location: http://'.$_SERVER['SERVER_NAME'].'/login.php?status=loggedout');
			}else{
				$this->ksdb = new Database;
				$this->base = (object) '';
				$this->base->url = 'http://'.$_SERVER['SERVER_NAME'].'/admin';
			}
		}
	}

	$admin = new Adminpanel();