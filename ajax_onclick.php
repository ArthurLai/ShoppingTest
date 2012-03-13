<?php

	$rid = $_GET["rid"];
	$mid = $_GET["mid"];
	$status = $_GET["status"];
	
	// echo $rid." ".$mid." ".$status;
	
	if($status == 'true')
		echo 'true';
	else 
		echo 'false';

?>