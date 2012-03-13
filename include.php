<?php
	include 'dbconnect.php';
	
	function sql_query($sql)
	{
		$result = mysql_query($sql);
		if (!$result)
  		{  		
  			echo "$sql <br />";				
 			$err = mysql_error();
 			die("Query Error : $err <br />");
  		}
  		
  		return $result;
	}
?>