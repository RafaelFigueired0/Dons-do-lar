<?php 
class clients {
    private $email;
    private $name;
    private $password;
    

    public function __construct($email,$name,$password,$phone)
    {
        $this->email=$email;
        $this->name=$name;
        $this->password=$password; 
        $this->phone=$phone;
    }

    public function getpassword()
    {
        return $this->password;
    }

    public function getname()
    {
        return $this->name;
    }


    public function getemail()
    {
        return $this->email;
    }
    public function getphone()
    {
        return $this->phone;
    }

}
?>