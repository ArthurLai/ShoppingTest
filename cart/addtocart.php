<?php session_start(); ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=Big5">
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

	// get_data_sel(1, 'bmw');
	function get_data_sel(pid, sel){

		selObj = document.getElementById(sel);

		get_data('detail', 'receive.php?pid='+pid+'&qty='+selObj.value);
		
	}
	
	</script>
<title>Insert title here</title>
</head>
<body>
	<table>
		<tr>
			<td>1. </td>
			<td>BMW</td>
			<td>100</td>
			<td>
				<select id="bmw">
					<option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
				</select>
			</td>
			<td><button type="button" onclick="get_data('detail', 'receive.php?pid=1&qty='+document.getElementById('bmw').value);">Click</button></td>
		</tr>
		<tr>
			<td>2. </td>
			<td>Porsche</td>
			<td>200</td>
			<td>
				<select id="porsche">
					<option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
				</select>
			</td>
			<td><button type="button" onclick="get_data('detail', 'receive.php?pid=2&qty=1');">Click</button></td>
		</tr>
		<tr>
			<td>3. </td>
			<td>AUDI</td>
			<td>300</td>
			<td>
				<select id="audi">
					<option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
				</select>
			</td>
			<td><button type="button" onclick="get_data('detail', 'receive.php?pid=3&qty=1');">Click</button></td>
		</tr>
		<tr>
			<td>4. </td>
			<td>Toyota</td>
			<td>10</td>
			<td>
				<select id="toyota">
					<option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
				</select>
			</td>
			<td><button type="button" onclick="get_data('detail', 'receive.php?pid=4&qty=1');">Click</button></td>
		</tr>
	</table>
	<div id="detail"></div>
</body>
</html>