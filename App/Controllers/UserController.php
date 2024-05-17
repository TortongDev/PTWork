<?php
require_once dirname(__DIR__)."/Models/Users.php";
class UserController {
    public function __construct(){
        $user = new Users;
    }
    public function store1($user){
        echo $user;
    }
    public function store($username,$password,$date_ob,$email){
        $user = new Users();
        $user->setUsername($username);
        $user->setPassword($password);
        $user->setDateOB($date_ob);
        $user->setEmail($email);
        $user->create();
    }
}
?>