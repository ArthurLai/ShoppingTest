#!/usr/bin/php -q
<?php
		
	class ATMXMLParserBlock{

		private $value;
		
		function ATMXMLParserBlock($value){
			$this->value = $value;
		}
		
		function getTag(){
			return $this->value["tag"];
		}
		
		function getLevel(){
			return $this->value["level"];
		}
		
		function getValue(){
			return $this->value["value"];
		}
		
		function getType(){
			return $this->value["type"];
		}
		
	}
	
	class ATMXMLParser{
		
		private $data;
		
		function ATMXMLParser($from_date){
			
			$url = "https://www.myb2b.com.tw/securities/tx10d0_txt.asp";
	
			$cust_id = "281515822404";
			$cust_pwd = "0okrfd2ws";
			$cust_nickname = "piratesatm";
			$acno = "024035001367";
			$from_date = date("Ymd"); //"20110901"; // date("Ymd", strtotime("-200 day"));
			$to_date = date("Ymd");
			$from_time = date("His", strtotime("-1 hour"));
			$to_time = date("His");
			$txdate8 = "Y";
			$xml="Y";
	
			$data = "cust_id=".$cust_id."&cust_pwd=".$cust_pwd."&cust_nickname=".$cust_nickname."&acno=".$acno
			."&from_date=".$from_date."&to_date=".$to_date."&txdate8=".$txdate8."&xml=".$xml."&from_time=".$from_time."&to_time=".$to_time;
			
			$output = $this->do_post_request($url, $data);
			//echo $data."<br />";
			//echo $output;
			
			$xmlparser = xml_parser_create();
	
			xml_parse_into_struct($xmlparser,$output,$values);

			xml_parser_free($xmlparser);
			
			$this->getData($values);
			
		}
		
		function getData($values){
			
			print date("Y-m-d H:i:s")." 開始收集資料 ! \n";
			
			//$i = 0;
			foreach ($values as $value){
				
				$block = new ATMXMLParserBlock($value);
				
				switch ($block->getTag()){
					
					case "BACCNO":
						$baccno = $block->getValue();
						break;
					case "TX_DATE":
						$txdate = $block->getValue();
						break;
					case "TX_SEQNO":
						$txseqno = $block->getValue();
						break;
					case "TX_IDNO":
						$txidno = $block->getValue();
						break;
					case "CHNO":
						$chno = $block->getValue();
						break;
					case "DC":
						$dc = $block->getValue();
						break;
					case "SIGN":
						$sign = $block->getValue();
						break;
					case "AMOUNT":
						$amount = $block->getValue();
						break;
					case "BSIGN":
						$bsign = $block->getValue();
						break;
					case "BAMOUNT":
						$bamount = $block->getValue();
						break;
					case "MEMO1":
						$memo1 = $block->getValue();
						break;
					case "TX_MACH":
						$txmatch = $block->getValue();
						break;
					case "TX_SPEC":
						$txspec = $block->getValue();
						break;
					case "BANKID":
						$bankid = $block->getValue();
						break;
					case "ACCNAME":
						$accname = $block->getValue();
						break;
					case "MEMO2":
						$memo2 = $block->getValue();
						break;
					case "TX_TIME":
						$txtime = $block->getValue();
						break;
					case "TXDETAIL":
						if($block->getType() == "close"){
							
							$sql = "select ATMTX_MEMO1 from atmtransactions where ATMTX_MEMO1=$memo1";
							$query = sql_query($sql);
							if(!mysql_num_rows($query)){
								
								$now = date("Y-m-d H:i:s");
								$sql = "insert into atmtransactions (ATMTX_BACCNO, ATMTX_TX_DATE, ATMTX_TX_SEQNO, ATMTX_TX_IDNO, ATMTX_CHNO, ATMTX_DC, ATMTX_SIGN,
									ATMTX_AMOUNT, ATMTX_BSIGN, ATMTX_BAMOUNT, ATMTX_MEMO1, ATMTX_TX_MACH, ATMTX_TX_SPEC, ATMTX_BANKID, ATMTX_ACCNAME, ATMTX_MEMO2, ATMTX_TX_TIME, ATMTX_RECDT)
									values ('$baccno', '$txdate', '$txseqno', '$txidno', '$chno', '$dc', '$sign', '$amount', '$bsign', '$bamount', '$memo1', '$txmatch', '$txspec', '$bankid'
									, '$accname', '$memo2', '$txtime', '$now')";
									//echo $sql."<br /><br />";
							
								sql_query($sql);
								
								print date("Y-m-d H:i:s")." 新增 $accname 匯入 $amount 到 $memo1 乙筆 ! \n";
								
							}
							
						} else { // "open"
							// clear
							$txtime = "";
							$memo2 = "";
							$accname = "";
							$bankid = "";
							$txspec = "";
							$txmatch = "";
							$memo1 = "";
							$bamount = "";
							$bsign = "";
							$amount = "";
							$sign = "";
							$dc = "";
							$chno = "";
							$txidno = "";
							$txseqno = "";
							$txdate = "";
							$baccno = "";
						}
						break;
					
				}
				
			}
			
			print date("Y-m-d H:i:s")." 結束收集資料 ! \n";
			
		}
		
		function do_post_request($url, $data, $optional_headers = null){
			
	  		$params = array('http' => array(
	              'method' => 'POST',
	              'content' => $data
	            ));
	  		if ($optional_headers !== null) {
	    		$params['http']['header'] = $optional_headers;
	  		}
	  		$ctx = stream_context_create($params);
	  		$fp = @fopen($url, 'rb', false, $ctx);
	  		if (!$fp) {
	    		throw new Exception("Problem with $url, $php_errormsg");
	  		}
	  		$response = @stream_get_contents($fp);
	  		if ($response === false) {
	    		throw new Exception("Problem reading data from $url, $php_errormsg");
	  		}
	  
	  		@fclose($fp);
	  		return $response;
		}
		
	}
	
	// $username = "test"; // pirates_user
	$username = "pirates_user";
	
	// $password = "test"; // kpi4m8s
	$password = "kpi4m8s";
					
	//$con = mysql_connect('localhost:8889', $username, $password); // 192.168.2.93:3306
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

	$from = date("Ymd");
	new ATMXMLParser($from);
	
?>