<?php
    require_once dirname(__DIR__)."/Class/Environment.php";
    require_once dirname(__DIR__)."/Models/AppConnection.php";

    class Model extends AppConnection {
        public function __construct(){

        }
        public function databaseInsert(string $sql,array $value){
            $insertStatement = self::$connect->prepare($sql);
            $insertStatement->execute($value);

        }
    }
?>