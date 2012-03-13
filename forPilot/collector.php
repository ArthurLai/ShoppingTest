#!/usr/bin/php -q
<?php 
	// 

	// $username = "test"; // pirates_user
	$username = "pirates_user";
	
	// $password = "test"; // kpi4m8s
	$password = "kpi4m8s";
					
	// $con = mysql_connect('localhost:8889', $username, $password); // 192.168.2.93:3306
	$con = mysql_connect('192.168.2.93:3306', $username, $password);
	if (!$con)
  	{
  		$err = mysql_error();
 		die("Could not connect : $err <br />");
  	}
  					
  	mysql_query("SET NAMES 'utf8'");
  					
  	// $database = "test";
  	$database = "pirates_db";
  	$open_db = mysql_select_db($database, $con);
  	if (!$open_db)
  	{
  		$err = mysql_error();
 		die("Could not open DB : $err <br />");
  	}

	function sql_query($sql)
	{
		$result = mysql_query($sql);
		// print "執行 : ".$sql;
		if (!$result)
  		{  		
  			print "$sql <br />";				
 			$err = mysql_error();
 			die("Query Error : $err <br />");
  		}
  		
  		return $result;
	}
	
	/*
	if(!file_exists("log")){
		
		if(!mkdir("log")){
			
			echo "建立 log 失敗 ";
			
		}
		
	}
	*/
	// $log = fopen("log/output.log", "a+");
	// if($log){
		
		$output = "[".date("Y/m/d H:i:s u")."]"."開始收集資料 \n";
		// fwrite($log, $output);
		print $output;
		
		// WARNING : AND od.PRODUCT_ID = p.PRODUCT_ID
		// 
		$now = date("Y-m-d H:i:s");
		$sql = "SELECT od.ORDER_DTL_QTY, od.ORDER_DTL_ID, m.MEMBER_NAME, p.PRODUCT_NAME, o.ORDER_NAME, a.ACT_ID
				FROM orders o, orderdetails od, products p, members m, activities a
				WHERE 	o.ORDER_ID = od.ORDER_ID
					AND o.ORDER_PAID = 0
					AND od.ORDER_DTL_QTY != 0
					AND od.PRODUCT_ID = p.PRODUCT_ID
					AND o.MEMBER_ID = m.MEMBER_INDEX
					AND a.PRODUCT_ID = p.PRODUCT_ID
					AND '$now' > o.ORDER_EXPDATE";
		
		$query = sql_query($sql);
		
		while ($row = mysql_fetch_array($query)) {
			
			$mname = $row["MEMBER_NAME"];
			$oname = $row["ORDER_NAME"];
			$pname = $row["PRODUCT_NAME"];
			$qty = $row["ORDER_DTL_QTY"];
			
			$odid = $row["ORDER_DTL_ID"];
			$aid = $row["ACT_ID"];
			
			$output = "[".date("Y/m/d H:i:s u")."]"."拉回 $mname 的訂單 $oname, $pname $qty 個 \n";
			// fwrite($log, $output);
			print $output;
			
			// set orderdetails to 0
			$sql = "update orderdetails set ORDER_DTL_QTY=0 where ORDER_DTL_ID=$odid";
			sql_query($sql);
			
			// add back to activities
			$sql = "select ACT_QTY from activities where ACT_ID=$aid";
			$a_query = sql_query($sql);
			if($a_row = mysql_fetch_array($a_query)){
				
				$aqty = $a_row["ACT_QTY"];
				$aqty += $qty;
				
				$sql = "update activities set ACT_QTY=$aqty where ACT_ID=$aid";
				sql_query($sql);
				
			}
			
		}
		
		// fclose($log);
		$output = "[".date("Y/m/d H:i:s u")."]"."結束收集資料 \n";
		// fwrite($log, $output);
		print $output;
		
	// } else {
		
		// echo "[".date("Y/m/d H:i:s u")."]"."檔案不存在";
	//	$output = "[".date("Y/m/d H:i:s u")."]"."檔案無法開啓";
	//	fwrite($log, $output);
		
	// }
		
?>