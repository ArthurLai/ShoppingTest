<?php

	$username = "pirates_user";
	$password = "kpi4m8s";
					
	// 192.168.2.93:3306
	$con = mysql_connect('localhost:8889', $username, $password);
	//$con = mysql_connect('192.168.2.93:3306', $username, $password);
	if (!$con)
  	{
  		$err = mysql_error();
 		die("Could not connect : $err <br />");
  	}
  					
  	mysql_query("SET NAMES 'utf8'");
  					
  	$database = "pirates_db";
  	$open_db = mysql_select_db($database, $con);
  	if (!$open_db)
  	{
  		$err = mysql_error();
 		die("Could not open DB : $err <br />");
  	}

?>