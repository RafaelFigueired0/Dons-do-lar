<?php 
class Product {
    private $products_id;
    private $name;
    private $price;
    private $quantity;
    private $img;
    private $composition;
    private $color;
    private $weight;
    private $date_added;
    private $type_products_id;


    public function __construct($products_id,$name,$price,$quantity,$img,$composition,$color,$weight,$date_added,$type_products_id)
    {
        $this->products_id = $products_id ;
        $this->name = $name;
        $this->price = $price;
        $this->quantity = $quantity;
        $this->img= $img;
        $this->color= $color;
        $this->composition= $composition;
        $this->weight= $weight;
        $this->date_added = $date_added;
        $this->type_products_id = $type_products_id;

    }

    public function getid()
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
    public function getimg()
    {
        return $this->img;
    }
    public function getcomposition()
    {
        return $this->composition;
    }
    public function getcolor()
    {
        return $this->color;
    }
    public function getweight()
    {
        return $this->weight;
    }

    public function getdate_added()
    {
        return $this->date_added;
    }
    public function gettype_products_id()
    {
     
        return $this->type_products_id;
        
    }
}
?>