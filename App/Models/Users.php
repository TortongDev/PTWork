<?php
require_once __DIR__.'/Model.php';
class Users extends Model {
    public $tableName = "tbusers";
    public $username;
    public $password;
    public $date_create;
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

    public function create(){
        $create = $this->insert(
            "insert into $this->tableName (username,password,email,create_timpstamp,user_status) values (?,?,?,?,?)",
            array($this->username,$this->encryptPassword($this->password),$this->validateEmail($this->email),$this->date_create,2)
        );
        echo json_encode(array('status','success'));

    }

}

?>