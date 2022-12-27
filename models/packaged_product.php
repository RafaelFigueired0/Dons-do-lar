<?php 
class PackagedProduct {
    private $products_id;
    private $name;
    private $price;
    private $quantity;
 



    public function __construct($products_id,$name,$price,$quantity)
    {
        $this->products_id = $products_id ;
        $this->name = $name;
        $this->price = $price;
        $this->quantity = $quantity;
   
    }

    public function getproduct_id()
    {
        return $this->products_id;
    }

    public function getname()
    {
        return $this->name;
    }

    public function getprice()
    {
        return $this->price;
    }
    public function getquantity()
    {
        return $this->quantity;
    }

}
?>