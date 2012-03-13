<?php

	include 'include.php';
	
	$sql = "INSERT INTO users (NAME, AGE) 
						VALUES ('Arthur', 18)";
	
	$result = sql_query($sql);
	$cnt = mysql_affected_rows();

	echo "$cnt";
	
?>