<?php 
class Producttype {
    private $type_products_id;
    private $name;
    private $description;



    public function __construct($type_products_id,$name,$description)
    {
        $this->type_products_id = $type_products_id ;
        $this->name = $name ;
        $this->description = $description ;
    }

    public function gettype_products_id()
    {
        return $this->type_products_id;
    }
    public function getnome()
    {
        return $this->name;
    }
    public function getdescription()
    {
        return $this->description;
    }
}
?>