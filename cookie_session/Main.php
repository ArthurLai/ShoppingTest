<?php

	include_once 'sessions.php';
	include_once 'Obj.php';
	
	class Main{
		
		var $sess;
		var $obj;
		
		function Main(){
			
			$this->sess = new sessions();
			
			$this->obj = $this->sess->getObj();
			if(is_null($this->obj))
				$this->obj = new Obj();
			
			// echo $this->obj->getName();
			$this->obj->setName('Arthur');
			$this->sess->setObj($this->obj);
			
		}
		
	}
	
	new Main();

?>