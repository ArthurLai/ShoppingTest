<?php

	class CartItem{
		
		private $itemName;
		private $itemQty;
		
		function CartItem($itemName, $itemQty = 0){
			
			$this->itemName = $itemName;
			
			if($itemQty != 0){
				
				$this->itemQty = $itemQty;
				echo '初始 '.$itemName.' '.$itemQty.' 個<br />';
				
			}
			
		}
		
		function addQty($qty){
			
			$this->itemQty += $qty;
			echo $this->itemName.' 增加 '.$qty.' 個, 總共 '.$this->itemQty.' 個<br />';
			
		}
		
		function removeQty($qty){
			
			$this->itemQty -= $qty;
			if($this->itemQty == 0)
				$this->itemQty = 0;
			echo $this->itemName.' 減少 '.$qty.' 個, 剩下 '.$this->itemQty.' 個<br />';
			
		}
		
		function toString(){
			
			echo $this->itemName.' 有 '.$this->itemQty.' 個<br />';
			
		}
		
		function getName(){
			return $this->itemName;
		}
		
		function getQty(){
			return $this->itemQty;
		}
		
	}

	class Cart{
		
		private $items;
		
		function addItem($item){ // $item, CartItem
			
			/*
			$hasItem = false;
			$name = $item->getName();
			foreach($this->items as $key => $value){
				
				if($key == $name){
					$hasItem = true;
					break;
				}
				
			}
			*/
			
			$name = $item->getName();
			if(isset($this->items[$name])){
				echo "商品 ".$name.' 已經存在<br />';
				return false;
			} else {
				$this->items[$name] = $item;
				echo "新增商品 ".$name.'<br />';
				return true;
			}
			
		}
		
		function removeItem($item){
			
			/*
			$hasItem = false;
			$name = $item->getName();
			foreach($this->items as $key => $value){
				
				if($key == $name){
					$hasItem = true;
					break;
				}
				
			}
			*/
			
			$name = $item->getName();
			if(!isset($this->items[$name])){
				echo "商品 ".$name.' 不存在<br />';
				return false;
			} else {
				unset($this->items[$name]);
				echo "移除商品 ".$name.'<br />';
				return true;
			}
			
		}
		
		function getItem($item){
			
			$name = $item->getName();
			if (isset($this->items[$name])){
				return  $this->items[$name];
			} else {
				echo "商品 ".$name.' 不存在<br />';
				return null;
			}
			
		}
		
		function toString(){
			
			echo '購物車裡有 : <br />';
			foreach ($this->items as $key => $value){
				echo $key.' '.$value->getQty().' 個<br />';
			}
			
		}
		
		function Cart(){
			
			echo "建構購物車中 ... <br />";
			
			
		}
		
	}
?>