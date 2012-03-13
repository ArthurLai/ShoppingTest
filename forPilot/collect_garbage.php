<?php

	// collect items
	$sql = "select * from orders o, orderdetails od where o.ORDER_ID = od.ORDER_ID ";
	$query = sql_query($sql);
	while ($row = mysql_fetch_array($query)) {
		;
	} 	

	// store back

?>