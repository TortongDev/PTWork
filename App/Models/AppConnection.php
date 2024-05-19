<?php
    require_once dirname(__DIR__)."/class/Environment.php";
class AppConnection 
{
    public static $_hostname = HOSTNAME;
    public static $_username = USERNAME;
    public static $_password = PASSWORD;
    public static $_dbname   = DATABASE;
    public static $type_database = TYPE_DB;
    

    public function __construct(){
    }
    public static function openConnectionMysql(){
        try {
            $connectt = new PDO("mysql:host=".self::$_hostname.";"."dbname=".self::$_dbname,self::$_username,self::$_password);
            $connectt->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            return $connectt;
        } catch (PDOException $error) {
            echo "Error response => ".$error->getMessage();
        }
    }
    public function prePrint($value){
        echo "<pre>";
        print_r($value);
        echo "</pre>";
    }
}



?>