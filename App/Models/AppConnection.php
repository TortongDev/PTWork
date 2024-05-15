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
                    self::OpenConnectionMysql();
                break;
            case 'SQL_SERVER':

                break;
            default:
                # code...
                break;
        }
    }
    public function OpenConnectionMysql(){
        try {
            $connect = new PDO("mysql:host=".self::$hostname."dbname=".self::$dbname,self::$username,self::$password);
            $connect->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            self::$connect = $connect;
        } catch (PDOException $error) {
            echo "Error response => ".$error->getMessage();
        }
    }
    public function CloseConnection(){

    }
}
new AppConnection('MYSQL');
?>