<?php
	session_start();
	class sessions{
		
		/*
		private $login;
		private $mid;
		
		function sessions($login, $mid){
			
			$this->login = $login;
			$this->mid = $mid;
			
		}
		*/
		
		private $login = "login";
		private $mid = "mid";
		private $obj = "obj";
		
		function setObj($obj){
			echo "set obj <br />";
			
			$_SESSION[$this->obj] = $obj;
		}
		
		function getObj(){
			echo "get obj <br />";
			
			if (isset($_SESSION[$this->obj]))
				return $_SESSION[$this->obj];
			else
				return null;
		}
		
		function setLoginStatus($login){ // true or false
			$_SESSION[$this->login] = $login;
		}
		
		function getLoginStatus(){
			if(isset($_SESSION["$this->login"]))
				return $_SESSION["$this->login"];
			else 
				return false;
		}
		
		function setMemberIndex($mid){
			$_SESSION[$this->mid] = $mid;
		}
		
		function getMemberIndex(){ // -1, not login
			if(isset($_SESSION[$this->mid]))
				return $_SESSION[$this->mid];
			else
				return -1;
		}
		
	}

?>