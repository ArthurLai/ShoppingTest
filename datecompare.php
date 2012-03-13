<?php

	function showDate($date){ // $date is string

		//$now = date("Y-m-d H:i:s"); // $now is string
		echo $date."<br />";
	
		$date = strtotime($date); // $now is number
		echo $date."<br />";
		
	}

	$date = date("Y-m-d H:i:s");
	showDate($date);
	
	$date = date("Y-m-d");
	showDate($date);
	
	$date = date("Y-m-d H:i:s", strtotime($date));
	echo $date."<br />";
	
	$date = date("H:i:s");
	showDate($date);
	
	/*
	$now = date("Y-m-d");
	//echo $now;
	if("2011-06-17" < $now)
		echo "true";
	else 
		echo "false";
	*/

?>