<?php
	$sel = $_POST["select"];
	
	if($sel)
	{
		foreach($sel as $value)
		{
			echo "$value <br />";
		}
	}
	else 
		echo "No Data Select ! <br />";
	
?>