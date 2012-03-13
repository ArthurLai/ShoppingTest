<?php

	$I = array(
		'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X'
	);
	
	$C = array(
		'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R'
	);
	
	$O = array(
		'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z', 'A', 'B', 'C', 'D'
	);
	
	$U = array(
		'U', 'V', 'W', 'X', 'Y', 'Z', 'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J'
	);
	
	//$number = 65535;
	
	//for($i = 0;$i < 4;$i++){
		
	//}
	
	$x = $I[($number % 16)];
	$str = $x.$str;
	$number = $number / 16;
	
	$x = $C[($number % 16)];
	$str = $x.$str;
	$number = $number / 16;
	
	$x = $O[($number % 16)];
	$str = $x.$str;
	$number = $number / 16;
	
	$x = $U[($number % 16)];
	$str = $x.$str;
	$number = $number / 16;
	 
	echo $str;
	
?>