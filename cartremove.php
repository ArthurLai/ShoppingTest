<html>
<head>
	<script type="text/javascript">

	function remove(i){

			source = "cart/removeitem.php?item=" + i;
			var xmlhttp;
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
					document.getElementById("col_"+i).innerHTML = "";					
				}
			};
					
			xmlhttp.open('GET', source, true);
			xmlhttp.send();
		
		
	}
	
	</script>
</head>
<body>
<table>
	<tr id='col_1'>
		<td>1</td>
		<td><a style='cursor: pointer;' onclick='remove(1);'>移除</a></td>
	</tr>
	<tr id='col_2'>
		<td>2</td>
		<td><a style='cursor: pointer;' onclick='remove(2);'>移除</a></td>
	</tr>
</table>

</body>
</html>