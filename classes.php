<?php

	class Test{
		
		private $t;
		
		function Test(){
			
		}
		
		function get(){
			return "I am test";
		}
		
	}
	
	$r = (new Test());
	$r = $r->get();
	echo $r;

?>