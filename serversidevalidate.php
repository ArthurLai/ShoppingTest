<html>
<head>
</head>
<script type="text/javascript">

var ok = false;

function get_data(id, source)
{
	source = source + "value=" + document.getElementById(id).value;
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
			if(xmlhttp.responseText == 'failed')
				document.getElementById("send").disabled = true;		
			else
				document.getElementById("send").disabled = false;			
		}
	};
			
	xmlhttp.open('GET', source, true);
	xmlhttp.send();
}

function gocheck(){

	get_data(source);
	
}
</script>
<body>
	<form action="go.php">
		<table>
			<tr>
				<td>id</td>
				<td><input type="text" name="id" id="id" onfocus="document.getElementById('send').disabled = true;" onblur="get_data('id', 'servervalidator.php?');" /></td>
				<td><input type="submit" id="send" value="send" disabled="disabled" /></td>
			</tr>
		</table>
	</form>
</body>
</html>