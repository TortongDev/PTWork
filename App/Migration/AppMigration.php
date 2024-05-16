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
            $auto_increment = array();
            foreach ($arrayField as $nameField => $value) {
                $field[] = array($nameField);
            }
            foreach ($arrayField as $key => $value) {
                $type[] = array($value['type']);
            }
            foreach ($arrayField as $key => $value) {
                $length[] = array($value['length']);
            }
            foreach ($arrayField as $key => $value) {
                $auto_increment[] = array($value['auto_increment']);
            }
            array_push($capsult, $field);
            array_push($capsult, $type);
            array_push($capsult, $length);
            array_push($capsult, $auto_increment);
            $auto_true = "";
            if($capsult[3][$key][0] == 1){
                $auto_true = " auto_increment primary Key ";
            }
            foreach ($capsult as $key => $value) {
                $statement .= $capsult[0][$key][0].' '.$capsult[1][$key][0]."(".$capsult[2][$key][0].")" . $auto_true  .",";
            }
           $field = substr($statement,0,-1);
           echo $field;
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