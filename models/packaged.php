<?php 
class Packaged {
    private $packaged_id;
    private $users_id;
    private $price;
    private $state;





    public function __construct($packaged_id, $users_id, $price, $state)
    {
        $this->packaged_id = $packaged_id;
        $this->users_id = $users_id;
        $this->price = $price;
        $this->state = $state;     
    }

    public function getpackaged_id()
    {
        return $this->packaged_id;
    }


    public function getusers_id()
    {
        return $this->users_id;
    }

    public function getprice()
    {
        return $this->price;
    }
    public function getstate()
    {
        return $this->state;
    }

}
?>