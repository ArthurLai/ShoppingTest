<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Insert title here</title>
<script type="text/javascript">

	function sayGood(id, rid, mid, status)
	{
		if (window.XMLHttpRequest)
		{// code for IE7+, Firefox, Chrome, Opera, Safari
			xmlhttp = new XMLHttpRequest();
		}
		else
		{// code for IE6, IE5
			xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		} 
				
		xmlhttp.onreadystatechange = function()
		{
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
			{
				if(xmlhttp.responseText == 'true')
					document.getElementById(id).innerHTML = '';					
			}
		};
		
		source = '../ajax_onclick.php?rid='+ rid + '&mid=' + mid + '&status=' + status;
		xmlhttp.open('GET', source, true);
		xmlhttp.send();
	}

</script>
</head>
<body>
	
	<p id="myp">
		<a onclick='sayGood("myp", 1, 2, true);'>Click Me ! </a> 
	</p>
	
</body>
</html>