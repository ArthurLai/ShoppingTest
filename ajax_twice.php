<?php session_start(); ?>
<?php include 'include.php'; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>template</title>
	
	<!-- basic css 
	<link rel="stylesheet" type="text/css" href="css/basic.css" />
	<link rel="stylesheet" type="text/css" href="css/layout.css" />
	-->
	<!-- extend css -->
	<!-- 
	<link rel="stylesheet" type="text/css" href="css/member.css" />
	 -->

	
	<script type="text/javascript">
	function getXMLHttp()
	{
		var xmlhttp;
		if (window.XMLHttpRequest)
		{// code for IE7+, Firefox, Chrome, Opera, Safari
			xmlhttp = new XMLHttpRequest();
		}
		else
		{// code for IE6, IE5
			xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		}

		return xmlhttp;
	}
	
	function get_data(id, source)
	{
		var xmlhttp = getXMLHttp();	 
					
		xmlhttp.onreadystatechange = function()
		{
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
			{
				document.getElementById(id).innerHTML = xmlhttp.responseText;					
			}
		};
				
		xmlhttp.open('GET', source, true);
		xmlhttp.send();
	}
	</script>
	
</head>

<!-- template -->
<body>
	
	<script type="text/javascript">get_data('newspostcontent', 'news_proxy.php?zoneid=1');</script>
	<div id="newspostcontent"></div>
	<script type="text/javascript">get_data('appcontent', 'news_proxy.php?zoneid=7');</script>
	<div id="appcontent"></div>
	<script type="text/javascript">get_data('appintrocontent', 'news_proxy.php?zoneid=8');</script>
	<div id="appintrocontent"></div>
	<script type="text/javascript">get_data('discontent', 'news_proxy.php?zoneid=5');</script>
	<div id="discontent"></div>

</body>
</html>