<?php

	$now = date("Y-m-d H:i:s");
		$sql = "SELECT od.ORDER_DTL_QTY, od.ORDER_DTL_ID, m.MEMBER_NAME, p.PRODUCT_NAME, o.ORDER_NAME, a.ACT_ID
				FROM orders o, orderdetails od, products p, members m, activities a
				WHERE 	o.ORDER_ID = od.ORDER_ID
					AND o.ORDER_PAID = 0
					AND od.ORDER_DTL_QTY != 0
					AND od.PRODUCT_ID = p.PRODUCT_ID
					AND o.MEMBER_ID = m.MEMBER_INDEX
					AND a.PRODUCT_ID = p.PRODUCT_ID
					AND '$now' > o.ORDER_EXPDATE";
		
		echo $sql;

?>