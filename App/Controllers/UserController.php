<?php
require_once dirname(__DIR__)."/Models/Users.php";
class UserController {
    public function __construct(){
        $user = new Users;
    }
    public function store1($user){
        echo $user;
    }
    public function store($username,$password,$email){
        $user = new Users();
        echo $username;
        $user->setUsername($username);
        $user->setPassword($password);
        $user->setEmail($email);
        $user->create();
    }
}
?>