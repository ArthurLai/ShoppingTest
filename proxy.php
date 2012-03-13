<?php
	$zoneid = $_GET["zoneid"];
	$pages = $_GET["pages"];
	
	$i = 0;
	//$get = " ";
	foreach ($zoneid as $z)
	{
		if($i > 0)
			$get = $get."&";
		
		$p = $pages[$i];
		$get = $get."zoneid[]=$z&pages[]=$p";
		//echo "$i . $p . $get <br/>";
		
		$i++;
	}
	
	$get = "http://news.iphone4.tw/multi_data_provider.php?".$get;
	
	// echo $get;
	echo file_get_contents($get);
?>