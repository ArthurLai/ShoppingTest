<?php
	session_start();
	
	class session{
		
		private $obj = "obj";
		private $name = "name";
		
		function destory(){
			if(session_destroy())
				echo "destroy success ! <br/>";
		}
		
		function getName(){
			if(isset($_SESSION[$this->name])){
				return $_SESSION[$this->name];
			} else {
				return null;
			}
		}
		
		function setName($name){
			$_SESSION[$this->name] = $name;
		}
		
		function getObj(){
			if(isset($_SESSION[$this->obj])){
				return $_SESSION[$this->obj];
			} else {
				return null;
			}
		}
		
		function setObj($obj){
			$_SESSION[$this->obj] = $obj;
		}
		
	}

?>