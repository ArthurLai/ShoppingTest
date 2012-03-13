<?php
	include_once 'session.php';
	
	class Obj{
		
		private $name;
		//private $phone;
		private $sess;
		
		function Obj(){
			
			$this->sess = new session();
			$this->name = $this->sess->getName();
			//if(is_null($this->name)){
			//	echo "Init name as null <br />";
			//} else {
			//	echo "Name is not null";
			//}
			
		}
		
		function getName(){
			
			return $this->name;
			
		}
		
		function setName($name){
			
			$this->name = $name;
			
		}
		
		function destory(){
			$this->sess->destory();
			//$this->sess->setName($this->name);
		}
		
	}

?>