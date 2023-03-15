<?php

class Home extends Controller
{
    
    public function index()
    {
        sessionValidator();
        $this->hasLogged();
        switch ($_SESSION['usertype']){
            case 'st':
                $this->view('student/home/index');
                break;
            case 'rc':
                $subjects = $this->model("rcHasSubjectModel")->getSubjects($_SESSION['id']);
                $chartData = $this->model("resourceModel")->getChartCounts($_SESSION['id']);
                $this->view('resourceCtr/home/index',array($subjects,$chartData));
                break;
            case 'ad':
                header("location:".BASEURL."admins/dashboard");
                break;
            case 'tch':
                $this->view('Teacher/home/index');

                break;
            case 'sp':
                $this->view('sponsor/home/index');
                break;
            default:
                header("location:".BASEURL."login");
        }
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


