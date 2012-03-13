<?php
	session_start();

	$pid = $_GET["pid"];
	$qty = $_GET["qty"];
	
	$total = $_SESSION["cart"]["total"];
	//$i = 0;
	if(isset($total)){
		
		for($i  = 0;$i < $total;$i++){
			
			/*
			if($_SESSION["cart"][$i]["pid"] == $pid)
				$_SESSION["cart"][$i]["qty"] += $qty;
			else{
				
				//echo $i;
				$_SESSION["cart"][$i]["pid"] = $pid;
				$_SESSION["cart"][$i]["qty"] = $qty;
				
			}
			*/
			
			if($_SESSION["cart"][$i]["pid"] == $pid){
				$exist = $i;
				break;
			}
				
			
			//echo $i." - ";
			//echo $_SESSION["cart"][$i]["pid"]." - ";
			//echo $_SESSION["cart"][$i]["qty"]."<br />";
			
		}
		
		if(isset($exist))
			$_SESSION["cart"][$exist]["qty"] += $qty;
		else{
			$_SESSION["cart"]["total"] = $total + 1;
			$_SESSION["cart"][$total]["pid"] = $pid;
			$_SESSION["cart"][$total]["qty"] = $qty;
		}
		
		//
		
	}else{
		
		$_SESSION["cart"]["total"] = 1;
		//echo $i;
		$_SESSION["cart"][0]["pid"] = $pid;
		$_SESSION["cart"][0]["qty"] = $qty;
		
		//$i = 0;
		//echo $i." - ";
		//echo $_SESSION["cart"][$i]["pid"]." - ";
		//echo $_SESSION["cart"][$i]["qty"]."<br />";
		
	}
	
	for($i  = 0;$i < $_SESSION["cart"]["total"];$i++){
			
			/*
			if($_SESSION["cart"][$i]["pid"] == $pid)
				$_SESSION["cart"][$i]["qty"] += $qty;
			else{
				
				//echo $i;
				$_SESSION["cart"][$i]["pid"] = $pid;
				$_SESSION["cart"][$i]["qty"] = $qty;
				
			}
			*/
			
			//if($_SESSION["cart"][$i]["pid"] == $pid){
			//	$exist = $i;
			//	break;
			//}
				
			
			echo $i." - ";
			echo $_SESSION["cart"][$i]["pid"]." - ";
			echo $_SESSION["cart"][$i]["qty"]."<br />";
			
	}

?>