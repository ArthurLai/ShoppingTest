<?php

	if($val = $_GET["val"]){

		//$val = $_GET["val"];
		
		if(preg_match_all("[0-9]{4}-[0-9]{6}", $val, $out)){
			echo "����i��";
		}else{
			echo "������i��";
		}	
		
	}
	
?>

<html>
<head>
</head>
<body>
	<form action="mobilephone.php">
		<table>
			<tr>
				<td> ������X�G </td>
				<td> <input type="text" name="val"  /> </td>
				<td> <input type="submit" value="send" /> </td>
			</tr>
		</table>
	</form>
</body>
</html>