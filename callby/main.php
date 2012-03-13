<?php
	include_once '../ajax/Ajax.php';

	class Main{
		
		function getErrMsg($opt, &$msg){ // always call by reference
			
			switch ($opt){
				
				case 1:
					$msg = "This is 1";
					break;
				case 2:
					$msg = "This is 2";
					break;
				
			}
			
		}
		
		function Main(){
			
			//$this->getErrMsg(2, $msg); // pass to normal variable
			
			//echo $msg;
			
			new Ajax();
			
		}
		
		
		
	}
	
	new Main();

?>