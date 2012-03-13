<?php
	include 'include.php';
	
	$bool = TRUE;
	$year = 1980;
	$month = 6;
	$day = 27;
	
	$date = "$year-$month-$day";
	
	$sql = "INSERT INTO store (DATE, BOL)
						VALUES('$date', $bool)";
	
	$result = sql_query($sql);
	if(mysql_affected_rows() > 0)
		echo "success !";
?>