<?php

	$special = $_POST["special"];

	for($i = 0;$i < 6;$i++)
	{
		$found = false;
		foreach ($special as $s)
		{
			if($s == $i)
			{
				$special_list = $special_list . " 1,";
				$found = true;
				break;
			}			
		}
		
		if($found)
			continue;
		
		$special_list = $special_list . " 0,";				
	}
	
		
	
	echo $special_list;
	
/*
	$name = $_POST["name"];
	$img = $_FILES["img"];

	if ($img["error"] > 0)
  	{
  		echo "Error: " . $img["error"] . "<br />";
  	}
	else
  	{
  		echo "Upload: " . $img["name"] . "<br />";
  		echo "Type: " . $img["type"] . "<br />";
  		echo "Size: " . ($img["size"] / 1024) . " Kb<br />";
  		echo "Stored in: " . $img["tmp_name"] . "<br />";
  		echo "$name" . "<br />";
  	}
  	
  	move_uploaded_file($img["tmp_name"], "upload/" . $img["name"]);
    echo "Stored in: " . "upload/" . $img["name"];
*/
?>