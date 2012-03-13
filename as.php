<?php
	include 'include.php';
	$sql = "SELECT * FROM store AS a WHERE a.ID>3";
	$result = sql_query($sql);
	while ($row = mysql_fetch_array($result))
	{
		$id = $row["ID"];
		echo "$id :<br />";
	}
?>