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

	<!-- 
	<script type="text/javascript" src="js/ajax_open.js"></script>
	 -->
</head>

<!-- template -->
<body>
	
	<form action="array.php" method="post">
		<table>
			<?php 
				for($i = 0;$i < 3;$i++)
				{
					echo "
						<tr>
							<td> <input type='hidden' name='value_set[]' value=$i /> </td>
						</tr>
					";
				}
			?>
			<tr>
				<td> <input type='submit' value='SUB' /> </td>
			</tr>
		</table>
	</form>
	
</body>
</html>