<html>
<body>
	<?php 
		$name = "Arthur";
		$phone = "0910";
	?>
	same<input type="radio" name="choice" onclick="same();">reset<input type="radio" name="choice" onclick="reset();">
	<script type="text/javascript">
		function same(){

			document.getElementById("name").value='<?php echo $name; ?>';
			document.getElementById("phone").value='<?php echo $phone; ?>';
			
		}

		function reset(){
			document.getElementById("name").value='';
			document.getElementById("phone").value='';
		}
	</script>
	<form action="">
		name : <input type="text" id="name" /><br />
		phone: <input type="text" id="phone" /> 
	</form>
</body>
</html>