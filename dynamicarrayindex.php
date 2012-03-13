<?php

	$test["i_1"] = "abc";
	$test["i_2"] = "def";
	
	for($i = 0;$i < 10;$i++){
		
		$index = "i_".$i;
		
		echo $test[$index];
		
	}

?>