<?php
class CartItem {
    private $products_id;
    private $quantity;




    public function __construct($products_id,$quantity)
    {
        $this->products_id = $products_id ;
        $this->quantity = $quantity;
    
    }

    public function getid()
    {
        return $this->products_id;
    }

    public function getquantity()
    {
        return $this->quantity;
    }
}
?>