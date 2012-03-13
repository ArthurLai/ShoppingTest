<?php session_start(); ?>
<?php include 'include.php'; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>template</title>
</head>

<!-- template -->
<body>
	<script type="text/javascript" >
		function out(msg)
		{
			document.write(msg);
		}

		function change()
		{
			a = "another change";
			ary[0] = "in change";
		}
		
		ary = new Array();	

		change();
		
		out(ary[0]);
		out(a);
	
	</script>
</body>
</html>