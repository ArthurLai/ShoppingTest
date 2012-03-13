<?php

	class cookies{
		
		private $username = "pilot_username";
		function setUsername($name){
			$_COOKIE[$this->username] = $name;
		}
		
		function getUsername(){
			if(isset($_COOKIE[$this->username]))
				return $_COOKIE[$this->username];
			else 
				return null;
		}
		
	}

?>