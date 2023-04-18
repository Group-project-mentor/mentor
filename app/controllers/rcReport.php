<?php

class RcReport extends Controller
{
    private $user = "rc";

    public function __construct()
    {
        sessionValidator();
    }

    public function index()
    {
        $result = $this->model("reportIssue")->getReportTypes($_SESSION['usertype']);
        $this->view('resourceCtr/reportIssue/reportIssue',array($result));
    }

    public function saveReport(){
        session_start();
        $response = array("alert"=>"","message"=>"");
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if($_POST['reportOptions'] == "0" or empty($_POST['reportDesc'])){
                $response['alert'] = "fill all";
            }else{
                if($this->model('reportIssue')->saveIssue($_SESSION['id'], $_POST['reportOptions'], $_POST['reportDesc'])){
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
