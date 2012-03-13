<?php

	if($val = $_GET["val"]){

		//$val = $_GET["val"];
		
		if(preg_match_all("[0-9]{4}-[0-9]{6}", $val, $out)){
			echo "手機可用";
		}else{
			echo "手機不可用";
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
				<td> 手機號碼： </td>
				<td> <input type="text" name="val"  /> </td>
				<td> <input type="submit" value="send" /> </td>
			</tr>
		</table>
	</form>
</body>
</html>