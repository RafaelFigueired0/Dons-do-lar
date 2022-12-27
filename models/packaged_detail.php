<?php 
class PackagedDetail {
    private $packaged_id;
    private $users_id;
    private $price;
    private $state;
    private $products;
    private $users_name;





    public function __construct($packaged_id, $users_id,$users_name, $price, $state,$products)
    {
        $this->packaged_id = $packaged_id;
        $this->users_id = $users_id;
        $this->users_name = $users_name;
        $this->price = $price;
        $this->state = $state;  
        $this->products = $products;    
    }

    public function getpackaged_id()
    {
        return $this->packaged_id;
    }


    public function getusers_id()
    {
        return $this->users_id;
    }
    public function getusers_name()
    {
        return $this->users_name;
    }

    public function getprice()
    {
        return $this->price;
    }
    public function getstate()
    {
        return $this->state;
    }
    public function getproducts()
    {
        return $this->products;
    }
}
?>