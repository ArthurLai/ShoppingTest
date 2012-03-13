<?php session_start(); ?>

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

	<!-- 
	<script type="text/javascript" src="js/ajax_open.js"></script>
	 -->
	 
	 <script type="text/javascript">
		var i = 0;
		var glbXMLHTTP = new Array();
	 	function inc()
	 	{
		 	var index = i++;
	 		glbXMLHTTP[index] = getXMLHTTP();

			var xmlhttp = glbXMLHTTP[index];
			xmlhttp.onreadystatechange=function()
				{
	 		  		if (xmlhttp.readyState==4 && xmlhttp.status==200)
	 		    	{
	 		    		document.getElementById("out").innerHTML=(i + "." + index + "." + xmlhttp.responseText);
	 		    	}
	 			};
	 		
	 		xmlhttp.open("GET","increase.php?i="+index,true);
	 		xmlhttp.send();
		}

		function getXMLHTTP()
		{
			var locXMLHTTP;
			if (window.XMLHttpRequest)
			{// code for IE7+, Firefox, Chrome, Opera, Safari
				locXMLHTTP = new XMLHttpRequest();
			}
			else
			{// code for IE6, IE5
				locXMLHTTP = new ActiveXObject("Microsoft.XMLHTTP");
			}

			return locXMLHTTP;
		}
	 </script>
</head>
	
<body>
	<div>
		<input type="button" onclick="inc();" value="click me"></input>
	</div>
	
	<div id="out"></div>
</body>
</html>