<?php
// �ӫ~�������O
class CartItem
{
    var $_sn;
    var $_name;
    var $_price;
    var $_quantity;
    var $_brief;
    var $_spec;
    var $_sub_total;
 
    function CartItem($_sn, $_name, $_price, $_quantity, $_brief, $_spec)
    {
        $this->_init();
 
        $this->_sn = $_sn;
        $this->_name = $_name;
        $this->_price = $_price;
        $this->_quantity = $_quantity;
        $this->_brief = $_brief;
        $this->_spec = $_spec;
 
        $this->_calc();
    }
 
    // ��s�ӫ~���ت��ƶq
    function updateItem($quantity)
    {
        $this->_quantity = $quantity;
        $this->_calc();
    }
 
    // ���o�Ӷ��ӫ~������p�p
    function getSubTotal()
    {
        return $this->_sub_total;
    }
 
    // ���o�Ӷ��ӫ~����T
    function getItem()
    {
        $item = array();
 
        $item['sn'] = $this->_sn;
        $item['name'] = $this->_name;
        $item['price'] = $this->_price;
        $item['quantity'] = $this->_quantity;
        $item['brief'] = $this->_brief;
        $item['spec'] = $this->_spec;
        $item['sub_total'] = $this->_sub_total;
 
        return $item;
    }
 
    function _init()
    {
        $_sn = "";
        $_name = "";
        $_price = 0;
        $_quantity = 0;
        $_brief = "";
        $_spec = "";
        $_sub_total = 0;
    }
 
    // �p��Ӷ��ӫ~���p�p����
    function _calc()
    {
        $this->_sub_total = $this->_quantity * $this->_price;
    }
 
}
 
// �ʪ����D���O
class Cart
{
    var $_items = array();
    var $_total = 0;
 
    function Cart()
    {
        $this->_init();
    }
 
    // �s�W�@���ӫ~
    function addItem($sn, $name, $price, $quantity, $brief, $spec)
    {
        if (!is_object($this->_items[$sn]))
        {
            $this->_items[$sn] = new CartItem($sn, $name, $price, $quantity, $brief, $spec);
 
            $this->_refresh();
            $_SESSION['Cart'] = $this;
        }
    }
 
    // ��s�Y���ӫ~���ƶq
    function updateItem($sn, $quantity)
    {
        if (is_object($this->_items[$sn]))
        {
            $this->_items[$sn]->updateItem($quantity);
            //$_SESSION['Cart']['items'][$sn] = $this->_items[$sn]->getItem();
            $this->_refresh();
            $_SESSION['Cart'] = $this;
        }
    }
 
    // �����Y���ӫ~
    function removeItem($sn)
    {
        if (is_object($this->_items[$sn]))
        {
            unset ($this->_items[$sn]);
            //unset ($_SESSION['Cart']['items'][$sn]);
            $this->_refresh();
            $_SESSION['Cart'] = $this;
        }
    }
 
    // �M���ʪ���
    function clearCart()
    {
        unset ($this->_items);
        unset ($_SESSION['Cart']);
        $this->_init();
    }
 
    // ���o�`��
    function getTotal()
    {
        $this->_refresh();
        return $this->_total;
    }
 
    // ���o�Ҧ����ӫ~����
    function getAllItems()
    {
 
        if(count($this->_items))
        {
 
            return $this->_items;
 
        }
        else
        {
            return false;
        }
    }
 
    // ��l��
    function _init()
    {
        // �p�G�ʪ�����Ƥw�g�s�b�F
 
         if(!isset($_SESSION['Cart']))
         {
            $this->_items = array();
            $this->_total = 0;
            $_SESSION['Cart']= $this;
            //echo 123;
         }
           else
           {
 
               $cart = $_SESSION['Cart'];
 
               $this->_items = $cart->_items;
               $this->_total = $cart->_total;
 
               $this->_refresh();
 
           }
 
    }
 
    // ���s�p���`��
    function _refresh()
    {
        $this->_total = 0;
 
        reset ($this->_items);
        foreach ($this->_items as $key => $item)
        {
            $this->_total += $item->getSubTotal();
        }
        reset ($this->_items);
 
    }
}
 
?>