<?php

	$t = $_POST["t1"];
	$c = $_POST["car"];
	
	function do_post_request($url, $data, $optional_headers = null)
	{
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

	if($c == 1)
		$resp = do_post_request("http://localhost:8887/test/POST_3.php", "t1=$t");
	else
		$resp = do_post_request("http://localhost:8887/test/POST_3.php", "t1=no$t");

	echo $resp;
	
?>