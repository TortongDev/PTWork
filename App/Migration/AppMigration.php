<?php
    class AppMigration  {
        private string $statement;
        private string $tableName;
        private string $id;
        public $statementMigrate;
        public function __construct(){

        }
        public function setTableName(string $tableName){
            $this->tableName = $tableName;
        }
        public function setPrimaryKey(String $id,int $length){
            $this->id = $id.' '.'int('.$length.') auto_increment primary key,';
        }
        public function setField(array $arrayField){
            $statement = "CREATE TABLE $this->tableName ( $this->id ";
            foreach ($arrayField as $key => $value) {
                
                if(@$value['length'] !=null){
                    $statement .= $key." ".$value['type']."(".@$value['length']."),";
                } else {
                    $statement .= $key." ".@$value['type']."),";
                }
            }
            $statement = substr($statement, 0, -1);
            $this->statementMigrate = $statement;
        }
    }
    $migrate  = new AppMigration();
    $migrate->setTableName("TEST_MIGRATE");
    $migrate->setPrimaryKey("TABLE_ID",10);
    $migrate->setField(array(
        "username"      => array(
            "type"      => "varchar",
            "length"    => 255
        ),
        "PASSWORD"      => array(
            "type"      => "varchar",
            "length"    => 255
        ),
        "status"      => array(
            "type"      => "varchar",
            "length"    => 25
        ),
        "create_date"      => array(
            "type"      => "varchar",
            "length"    => 25
        ),
        "desc"      => array(
            "type"      => "text"
            // "length"    => 25
        )
    ))
?>