<link rel="stylesheet" type="text/css" href="css/base.css" />

<?php

	$each = 6;
	$total = 16; // from DB : chapters / num_per_page
	$total_page = ceil($total / $each);
	
	$cur = $_GET["cur"]; // from GET
	$cur_page =  floor($cur/$each); 
	
	if($cur % $each == 0)
		$cur_page = $cur_page - 1;
	
	// echo $cur_page."<br />";
	$start = 6*$cur_page + 1;
	$end  = 6*($cur_page + 1);
	if($end > $total)
		$end = $total;
	
	if($cur_page > 0)
	{
		$prv = $start - 1;
		echo "<a href='more_page.php?cur=$prv'> ... </a>";
	}
	
	// echo $start." ".$end;
	for($i = $start;$i <= $end;$i++)
	{
		if($i == $cur)
		{
			echo "<a class='cur' href='http://www.google.com.tw'> $i</a>";
		}
		else
		{
			echo "<a href='http://www.yahoo.com.tw'> $i</a>";
		}	
	}
	
	
	if($total_page - 1 > $cur_page)
	{
		$nxt = $end + 1;
		echo "<a href='more_page.php?cur=$nxt'> ... </a>";
	}
	
	

?>