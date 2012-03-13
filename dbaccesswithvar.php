<?php

	include_once 'include.php';
	
	$sql = "select name from users where id=1";
	$result = sql_query($sql);
	while ($row = mysql_fetch_array($result)) {
		
		$col = "name";
		echo $row[$col]; 
		
	}
	
	
	
?>