<?php

	$expdate = date("ymd", strtotime("+2 days"));
	echo $expdate."<br />";
	$date = date("ymd", strtotime($expdate));
	echo $date."<br />";
	
	$expdate = date("Y-m-d H:i:s", strtotime("+2 days"));
	echo $expdate."<br />";
	

?>