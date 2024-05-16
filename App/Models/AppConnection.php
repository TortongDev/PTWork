<?php
require_once dirname(__DIR__)."/class/Environment.php";
class AppConnection 
{
    private static $hostname = HOSTNAME;
    private static $username = USERNAME;
    private static $password = PASSWORD;
    private static $dbname   = DATABASE;
    private static $type_database = TYPE_DB;
    public static $connect = null;
    

    public function __construct($type_database){
        self::$type_database = $type_database; 
        switch (self::$type_database) {
            case 'MYSQL':
                    self::openConnectionMysql();
                break;
            case 'SQL_SERVER':

                break;
            default:
                
                break;
        }
    }
    public function openConnectionMysql(){
        try {
            $connect = new PDO("mysql:host=".self::$hostname.";"."dbname=".self::$dbname,self::$username,self::$password);
            $connect->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            echo "Connection Success.";
            self::$connect = $connect;
        } catch (PDOException $error) {
            echo "Error response => ".$error->getMessage();
        }
    }
    public function closeConnection(){
        self::$connect = NULL;
    }
    public function __destruct(){
        self::$connect = NULL;
    }
    public function prePrint($value){
        echo "<pre>";
        print_r($value);
        echo "</pre>";
    }
}

new AppConnection(TYPE_DB);

?>