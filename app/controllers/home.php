<?php

class Home extends Controller
{
    public function __construct()
    {
        flashMessage();
    }

    public function index()
    {
        sessionValidator();
        $this->hasLogged();
        switch ($_SESSION['usertype']){
            case 'st':
                $this->view('student/home/index');
                break;
            case 'rc':
                $typeCount = $this->model('resourceModel')->getTypeCount($_SESSION['id']);
                $typeCountList = array();
                foreach ($typeCount as $row){
                    $typeCountList[$row->status] = $row->res_count;
                }
                $mySubjectCount = $this->model("resourceModel")->getMyResourcesCount($_SESSION['id']);
                $subjects = $this->model("rcHasSubjectModel")->getSubjects($_SESSION['id']);
                $chartData = $this->model("resourceModel")->getChartCounts($_SESSION['id']);
                $this->view('resourceCtr/home/index',array($subjects,$chartData,$mySubjectCount,$typeCountList));
                break;
            case 'ad':
                header("location:".BASEURL."admins/dashboard");
                break;
            case 'tch':
                unset($_SESSION["cid"]);
                unset($_SESSION["cname"]);
                $classes = $this->model("teacher_data")->getClasses($_SESSION['id']);
                $this->view('Teacher/home/index',array($classes));

                break;
            case 'sp':
                $this->view('sponsor/home/index');
                break;
            default:
                header("location:".BASEURL."login");
        }
    }

    public function bmc(){
        $this->view('BMC');
    }

    public function saveBmc(){
        $count = $_POST['custom_1'];
        $name = $_POST['card_holder_name'];
        $amount = $_POST['payhere_amount'];
        $email = $_POST['custom_2'];
        $this->model("payments")->saveBMC($name,$email,$amount,$count);
        flashMessage("Success");
    }

    public function toggle(){
        session_start();
        if($_SESSION['navtog'] == 1){
            $_SESSION['navtog'] = 0;
        }else{
            $_SESSION['navtog'] = 1;
        }
        echo "jeyy";
    }

    private function hasLogged()
    {
        if (!isset($_SESSION['user'])) {
            header("location:" . BASEURL . "login");
        }

    }


}

?>


