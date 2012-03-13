<?php

	include 'cart/classes.php';
	
	$cart = new Cart();
	
	$item_1 = new CartItem("葡萄", 10);
	$item_1->addQty(5);
	$item_1->removeQty(6);
	
	$cart->addItem($item_1);
	
	//$item_3 = new CartItem("葡萄", 10);
	//$cart->addItem($item_3);
	
	$item_2 = new CartItem("草莓", 20);
	$item_2->addQty(15);
	$item_2->removeQty(16);
	
	$cart->addItem($item_2);
	
	$cart->toString();
	
	/*
	$cart->removeItem($item_1);
	$cart->toString();
	$cart->removeItem($item_1);
	$cart->toString();
	*/
	
	$item = new CartItem("葡萄");
	$item = $cart->getItem($item);
	if(!is_null($item))
		$item->toString();
		
	$item = new CartItem("香蕉");
	$item = $cart->getItem($item);
	if(!is_null($item))
		$item->toString();

?>