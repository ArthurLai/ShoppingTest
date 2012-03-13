<?php 
	$today = date("Y-m-d");
	$text = "2012-07-21";
	
	echo "today : ".$today."<br />";
	echo "text : ".$text."<br />";
	
	if($text > $today){
		
		echo "1";
		exit;
		exit("<br />its true");
	}
		
	else{
		
		echo "2";
	} 
		
	echo "<br />can't show";
?>