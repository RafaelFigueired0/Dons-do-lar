<?php
interface IUserService {
    public function getUser($email);
    
    public function postUser($email, $name, $password,$phone);

    public function validatePassword($email, $password);
}
?>