<?php
class User {
    private $users_id;
    private $email;
    private $name;
    private $password;
    private $phone;
    private $date_added;
    private $updated_at;
    private $role;

    public function __construct($users_id , $email, $name, $phone, $password, $date_added, $updated_at, $role)
    {
        $this->users_id=$users_id;
        $this->email=$email;
        $this->name=$name;
        $this->password=$password; 
        $this->phone=$phone;
        $this->date_added=$date_added;
        $this->updated_at=$updated_at;
        $this->role=$role;
    }

    public function getusers_id()
    {
        return $this->users_id;
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
    public function getdate_added()
    {
        return $this->date_added;
    }
    public function getupdated_at()
    {
        return $this->updated_at;
    }
    public function getrole()
    {
        return $this->role;
    }
}
?>