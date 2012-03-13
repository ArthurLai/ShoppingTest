<?php

	//include_once 'include.php';

	$date = date("Y-m-d");
	$time = date("H:i:s");
	
	//$sql = "insert into users (DATE, TIME) values ('$date', '$time')";
	//sql_query($sql);
	
	//echo date("Y-m-d H:i:s", strtotime("now")), "<br />";
	//echo date("Y-m-d H:i:s", strtotime("10 September 2000")), "<br />";
	//echo date("Y-m-d H:i:s", strtotime("+1 day")), "<br />";
	//echo date("Y-m-d H:i:s", strtotime("+1 week")), "<br />";
	//echo date("Y-m-d H:i:s", strtotime("+1 week 2 days 4 hours 2 seconds")), "<br />";
	//echo date("Y-m-d H:i:s", strtotime("next Thursday")), "<br />";
	//echo date("Y-m-d H:i:s", strtotime("last Monday")), "<br />";
	
	$from_date = date("Ymd", strtotime("-1 day"));
	$to_date = date("Ymd");
	$from_time = date("His", strtotime("-1 hour"));
	$to_time = date("His");
	
	echo $from_date."<br />";
	echo $to_date."<br />";
	echo $from_time."<br />";
	echo $to_time."<br />";

?>