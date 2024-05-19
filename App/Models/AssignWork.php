<?php
require_once __DIR__.'/Model.php';
class AssignWork extends Model {
    public $tableName = "task_assignor";
    public $title;
    public $text;
    public $job_status;
    public $assignor;
    public $recipient;
    public $date_start;
    public $date_end;
    public $importance;
    public $create_timestamp;
    public function __construct(){
        parent::__construct();
        $this->create_timestamp = date("Y-m-d");
    }
    public function setTitle($title): void{
        $this->title = $title;
    }
    public function setText($text): void{
        $this->text = $text;
    }
    public function setJobStatus($job_status){
        $this->job_status = $job_status;
    }
    public function setAssignor($assignor){
        $this->assignor = $assignor;
    }
    public function setRecipient($recipient){
        $this->recipient = $recipient;
    }
    public function setDateStart($date_start){
        $this->date_start = $date_start;
    }
    public function setDateEnd($date_end){
        $this->date_end = $date_end;
    }
    public function setImportance($importance){
        $this->importance = $importance;
    }
    public function create(){
        $create = $this->insert(
            "
            INSERT INTO `task_assignor`(
                `title`,
                `text`, 
                `job_status`,
                `assignor`, 
                `recipient`, 
                `date_start`, 
                `date_end`, 
                `importance`, 
                `create_timestamp`
                ) VALUES (
                    ?,?,?,?,?,?,?,?,?
                )
            ",
            array(
                $this->title,
                $this->text,
                $this->job_status,
                $this->assignor,
                $this->recipient,
                $this->date_start,
                $this->date_end,
                $this->importance,
                $this->create_timestamp
            )
        );
        echo json_encode(array('status','success'));

    }

}

?>