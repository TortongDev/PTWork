<?php
require_once __DIR__.'/Model.php';
class Users extends Model {
    private $username;
    private $password;
    private $date_ob;
    
    private $date_create;
    private $email;
    public function __construct(){
        parent::__construct();
        $this->date_create = date("Y/m/d");
    }
    public function setUsername($username){
        $this->username = $username;
    }
    public function setPassword($password){
        $this->password = $password;
    }
    public function setEmail($email){
        $this->email = $email;
    }
    public function setDateOB($date_ob){
        $this->date_ob = $date_ob;
    }

    public function create(){
        $create = $this->insert(
            "insert into tbusers (username,password,date_ob,email) values (?,?,?,?)",
            array($this->username,$this->encryptPassword($this->password),$this->date_create,$this->email)
        );
        echo json_encode(array('status','success'));

    }

}

?>