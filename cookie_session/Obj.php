<?php
	//include_once 'sessions.php';
	
	class Obj{
		
		var $name;
		//var $sess;
		
		function Obj(){

			//$this->sess = new sessions();
			
			
			
		}
		
		function getName(){
			if(isset($this->name))
				return $this->name;
			else
				return "";
		}
		
		function setName($name){
			echo "Set name as $name <br />";
			$this->name = $name;
		}
		
	}

?>