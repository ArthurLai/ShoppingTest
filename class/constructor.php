<?php

	class MyClass{
		
		public function MyClass($first, $second){
			
			echo "welcome home <br />";
			
			if(!is_null($first)){
				echo "Hi, $first <br />";
			}
			
			if(!is_null($second)){
				echo "Hi, $second <br />";
			}
			
			
		}
		
	}
	
	new MyClass();
	
	new MyClass("Arthue");
	
	new MyClass("Arthue", "15800");
	
	new MyClass(null, "25800");

?>