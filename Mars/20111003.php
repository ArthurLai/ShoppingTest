<?php

	$rating_time1=(strtotime($row_now["2011-10-01 04:30"])-strtotime($row_now["2011-10-01 00:00"]))/60;
	$rating_time2 = floor($rating_time1 / 60);
	function rating_time3($rating_time2){
		if ($rating_time2 < 10){
			echo $rating_time2;
		}
	}
	$rating_time4 = rating_time3($rating_time2).":".$rating_time1 % 60;	
	echo $rating_time4;

?>