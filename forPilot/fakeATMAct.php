<?php

	include_once '../include.php';
	
	function getP1(){
		
		$act = "110912001";
		$mny = 1024;
		
		$aryAct = array(7, 3, 7, 3, 0, 0, 0, 0, 0, 0, 0, 0, 0);
		$aryActWt = array(4, 5, 6, 7, 8, 9, 1, 2, 3, 4, 5, 6, 7);
		
		$aryMny;
		$aryMnyWt = array(1, 2, 3, 4, 5, 6, 7, 8);
		
		//$act = 110401001;
		for($i=12;$i >=4;$i--){
			
			//echo $i;
			$aryAct[$i] = $act % 10;
			//echo $aryAct[$i];
			//$tmp = $act % 10;
			$act = $act / 10;
			
			//echo $i." : ".$tmp." . ".$act."<br />";
			
		}
		//echo $aryAct;
		
		
		
		$tmp = 0;
		for($i = 0;$i < 13;$i++){
			
			$tmp += ($aryAct[$i] * $aryActWt[$i]) % 10;
			//echo $aryAct[$i]." . ".$aryActWt[$i]." . ".(($aryAct[$i] * $aryActWt[$i]) % 10)." . ".$tmp."<br />";
			
		}
		
		$str_mny = strval($mny);
		for($i = 0;$i < strlen($str_mny);$i++){
			
			$aryMny[$i] = $mny % 10;
			$mny = $mny / 10;
			
			echo $aryMny[$i]." <br /> ";
			//echo $i."<br />";
			
		}
		
		$tmp = 0;
		for($i = 0;$i < strlen($str_mny);$i++){
			
			echo $aryMny[$i]." . ".$aryMnyWt[$i]."<br />";
			$tmp += ($aryMny[$i] * $aryMnyWt[$i]) % 10;
			
		}
		
		echo $tmp;
		
	}
	
	function getAct($act, $mny){
	
		//$act = "110912001";
		//$mny = 10;
		
		$aryAct = array(7, 3, 7, 3, 0, 0, 0, 0, 0, 0, 0, 0, 0);
		$aryActWt = array(4, 5, 6, 7, 8, 9, 1, 2, 3, 4, 5, 6, 7);
		
		$aryMny;
		$aryMnyWt = array(1, 2, 3, 4, 5, 6, 7, 8);
		
		//$act = 110401001;
		for($i = 12;$i >= 4;--$i){
			
			//echo $i;
			$aryAct[$i] = $act % 10;
			//echo $aryAct[$i];
			//$tmp = $act % 10;
			$act = $act / 10;
			
			//echo $i." : ".$tmp." . ".$act."<br />";
			
		}
		//echo $aryAct;
		
		$tmp = 0;
		for($i = 0;$i < 13;$i++){
			
			//echo $i." . ".$aryAct[$i]." . ".$aryActWt[$i]."<br />";
			$tmp += ($aryAct[$i] * $aryActWt[$i]) % 10;
			
		}
		$actNum = $tmp % 10;
	
		//$mny = 100;
		$str_mny = strval($mny);
		for($i = 0;$i < strlen($str_mny);$i++){
			
			$aryMny[$i] = $mny % 10;
			$mny = $mny / 10;
			
			//echo $aryMny[$i]." <br /> ";
			//echo $i."<br />";
			
		}
		
		$tmp = 0;
		for($i = 0;$i < strlen($str_mny);$i++){
			
			//echo $aryMny[$i]." . ".$aryMnyWt[$i]."<br />";
			$tmp += ($aryMny[$i] * $aryMnyWt[$i]) % 10;
			
		}
		$mnyNum = $tmp % 10;
		
		$num = 10 - (($actNum + $mnyNum) % 10);
		if($num == 10)
			$num = 0;
		
		//echo "<br />".$num;
	
	
		return $num;	
		
		
	}

	function getOrderATMSeq($expdate){
		
		//$paytypeid = $_SESSION["paytypeid"];
		//$paytype = getPayType($paytypeid);
		
		//$mny = $_SESSION["mny"];
		//$mny = 1;
		
		$mid = "001"; // order id, from db
		$key = date("ymd");
		$sql = "SELECT * FROM atmtransactionseqs WHERE ATM_TRANSACTION_KEY='$key'";
		$result = sql_query($sql);
		$count = mysql_affected_rows();
		if($count == 1){
			
			$row = mysql_fetch_array($result);
			$val = $row["ATM_TRANSACTION_VAL"];
			
			// use it
			$mid = str_pad($val, 3, '0', STR_PAD_LEFT);
			
			// plus it
			$val = $val + 1;
			$sql = "UPDATE atmtransactionseqs SET ATM_TRANSACTION_VAL=$val WHERE ATM_TRANSACTION_KEY='$key'";
			$result = sql_query($sql);
			
		}
		else{
			
			//$val = 1;
			$val = 2;
			//$sql = "UPDATE orderseqs (ORDERSEQ_VAL) VALUES $val WHERE ORDERSEQ_KEY=$key";
			$sql = "INSERT INTO atmtransactionseqs (ATM_TRANSACTION_KEY, ATM_TRANSACTION_VAL) VALUES ('$key', $val)";
			$result = sql_query($sql);
			
		}
		
		$total = 100; // 總交易金額
		//$total = 1;
		
		$orderNoGenDate = date("Y-m-d");
		
		$date = date("ymd", strtotime($expdate));
		$act = $date.($mid); //.getAct($act, $mny);
		$PtrAcno = "7373".$act.getAct($act, $total);
		//$id = $_SESSION['index'];
		
		//$rcptype = $_SESSION['rcptype'];
		//$ordertype = $_SESSION['ordertype'];
		//$sql = " INSERT INTO orders (ORDER_NAME, ORDER_DATE,      	MEMBER_ID, 	ORDER_TOTAL, ORDER_RCP, 	ORDER_PAID)  
		//	VALUES  ('$PtrAcno', '$orderNoGenDate', $id,		$total,		$paytypeid,		0)";
		
		//$result = sql_query($sql);
		//$count = mysql_affected_rows();
		
		//if($count == 1){
			//echo "success";
		//}
		//else{
			//echo "failed";
		//}
		
		return $PtrAcno;
		
	}
	
	echo getOrderATMSeq('2011-09-17');

?>