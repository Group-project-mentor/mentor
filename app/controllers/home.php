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
                $this->view('resourceCtr/home/index');
                break;
            case 'ad':
                $this->view('admin/home/index');
                break;
            case 'tch':
                $this->view('teacher/home/index');
                break;
            case 'sp':
                $this->view('sponsor/home/index');
                break;
            default:
                header("location:".BASEURL."login");
        }


    }

    private function hasLogged()
    {
        if (!isset($_SESSION['user'])) {
            header("location:" . BASEURL . "login");
        }

    }
}


?>



