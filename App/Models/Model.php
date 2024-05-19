<?php
    require_once dirname(__DIR__)."/Class/Environment.php";
    require_once dirname(__DIR__)."/Models/AppConnection.php";
    class Model extends AppConnection {
        public static $connect;
        public function __construct(){
            self::$connect = self::openConnectionMysql();
        }
        public function insert($sql, $value): bool
        {
            var_dump(self::$connect);
            $insertStatement = self::$connect->prepare($sql);
            $insertStatement->execute($value);
            return true;
        }
        public function selectByWhere(string $sql,array $value){
            $selectStatement = self::$connect->prepare($sql);
            $selectStatement->execute($value);
        }
        public function selectAll(string $sql){
            $selectStatement = self::$connect->prepare($sql);
            $selectStatement->execute(['1=1']);
        }
        public function encryptPassword($password): string
        {
            $inputPassword = $password;
            $encrypt = password_hash($inputPassword , PASSWORD_DEFAULT);
            return $encrypt;
        }
        public function validateEmail($inputEmail){
            $email = filter_var($inputEmail , FILTER_SANITIZE_EMAIL);
            return $email;
        }
        public function validateValue($inputText){
            $text = filter_var($inputText , FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            return $text;
        }
        public function request($inputName){
            $text = filter_input('POST',$inputName , FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            return $text;
        }
        public function decryptPassword(int $password,string $passwordEncrypt): bool {
            $password = password_verify($password,$passwordEncrypt);
            if($password):
                $bypass = true;
            else:
                $bypass = false;
            endif;
            return $bypass;
        }
        public function migration(){

        }
    }
   
?>