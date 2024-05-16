<?php
    require_once dirname(__DIR__)."/Models/AppConnection.php";
    class AppMigration extends AppConnection {
        private string $statement;
        private string $tableName;
        public function __construct(){

        }
        public function setTableName(string $tableName){
            $this->tableName = $tableName;
        }
        public function setField(array $arrayField){
            $statement = "CREATE TABLE $this->tableName ( ";
            $field = array();
            $type = array();
            $capsult = array();
            foreach ($arrayField as $nameField => $value) {
                $field[] = array($nameField);
            }
            foreach ($arrayField as $key => $value) {
                $type[] = array($value['type']);
                // $field .= $value['type'];
            }
            array_push($capsult, $field);
            array_push($capsult, $type);
            
           $this->prePrint($capsult);

            // $field = substr($field,0,-1);
            // echo $field;
        }
    }
    $migrate  = new AppMigration();
    $migrate->setTableName("TEST_MIGRATE");
    $migrate->setField(array(
        "id" => array(
            "type"          => "int",
            "length"        => 10,
            "auto_increment" => true,
            "primarykey"    => true
        ),
        "username"      => array(
            "type"      => "varchar",
            "length"    => 255
        ),
        "PASSWORD"      => array(
            "type"      => "varchar",
            "length"    => 255
        )
    ))
?>