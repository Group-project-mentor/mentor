<?php

class RcReport extends Controller
{
    private $user = "rc";

    public function __construct()
    {
    }

    public function index()
    {
        $this->view('resourceCtr/reportIssue/reportIssue');
    }

    public function saveReport(){
        session_start();
        $response = array("alert"=>"","message"=>"");
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if($_POST['reportOptions'] == "0" or empty($_POST['reportDesc'])){
                $response['alert'] = "Please fill all entries !";
            }else{
                if($this->model('reportIssue')->saveIssue(2, $_POST['reportOptions'], $_POST['reportDesc'])){
                    $response['message'] = "success";
                }else{
                    $response['message'] = "failed";
                }
            }
        }

        // header('Content-Type:application/json');
        echo json_encode($response);
    }
}
