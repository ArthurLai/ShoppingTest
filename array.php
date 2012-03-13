<?php

	$value_set = $_POST["value_set"];
	echo count($value_set)."<br />";
	foreach ($value_set as $v)
	{
		echo "$v <br />";
	}
	
	

?>