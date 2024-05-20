<?php
    require_once dirname(__DIR__)."/Class/Environment.php";
    require_once dirname(__DIR__)."/Models/AppConnection.php";
    class Model extends AppConnection {
        public static $connect;
        public $pathUpload;
        public function __construct(){
            $this->pathUpload = dirname(dirname(__DIR__))."/Front/public/uploads";
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
            $text = $_POST[$inputText];
            $text = trim($text);
            $text = stripslashes($text);
            $text = htmlspecialchars($text, ENT_QUOTES);
            return $text;
        }
        public function request($inputName){
            $text = $_POST[$inputName];
            $text = trim($text);
            $text = stripslashes($text);
            $text = htmlspecialchars($text, ENT_QUOTES);
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
        public function uploadImage($file){
            $fileName = $file['name'];
            $tmpName = $file['tmp_name'];
            $filePath = $this->pathUpload.'/'.$fileName;
            $fileSize = getimagesize($tmpName);
            if($fileSize['mime'] != 'image/png' &&$fileSize['mime'] != 'image/jpg' &&$fileSize['mime'] !=  'image/jpeg'):
                echo json_encode(array('imageResponse'=>'you can not this type.'.$fileSize['mime']));
                return 0;
            endif;

            if($file['size'] >= 200000):
                echo json_encode(array('imageResponse'=>'you can upload file < 2mb.'.$fileSize['mime']));
                return 0;
            endif;

            if(file_exists($filePath)):
                echo json_encode(array('imageResponse'=>'can not find file upload.'));
                return 0;
            endif;
            echo $filePath;
            if(move_uploaded_file($tmpName, $filePath)):
               echo "success";
            else: 
                echo "not upload";
                
            endif;
        }
        public function migration(){

        }
    }
   
?>