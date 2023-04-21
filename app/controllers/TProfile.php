<?php

class TProfile extends Controller{
    private $user = "tch";

    public function __construct()
    {
        sessionValidator();
        $this->userValidate($this->user);
        flashMessage();
    }


    public function profile(){
        $this->view('Teacher/Profile/profile');
    }   

    public function profileImg(){
        $this->view('Teacher/Profile/profileImage');
    } 

    public function reportIssue()
    {
        $result = $this->model("reportIssue")->getReportTypes($_SESSION['usertype']);
        $this->view('Teacher/reportIssue/TreportIssue',array($result));
    }
    public function saveReport(){
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

?>