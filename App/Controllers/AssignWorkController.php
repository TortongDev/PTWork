<?php
require_once dirname(__DIR__)."/Models/AssignWork.php";
class AssignWorkController {
    public function __construct(){
    }

    public function postRequest(){
        $aw = new AssignWork;
        // $aw->setTitle($aw->request("title"));
        // $aw->setText($aw->request("text"));
        // $aw->setJobStatus($aw->request("job_status"));
        // $aw->setAssignor($aw->request("assignor"));
        // $aw->setRecipient($aw->request("recipient"));
        // $aw->setDateStart($aw->request("date_start"));
        // $aw->setDateEnd($aw->request("date_end"));
        // $aw->setImportance($aw->request("importance"));
        $aw->uploadImage($_FILES['fileUpload']);
    }
}
?>