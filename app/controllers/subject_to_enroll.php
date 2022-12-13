<?php

class subject_to_enroll extends Controller
{
    public function index()
    {
        sessionValidator();
        $this->hasLogged();
        $res=$this->model('subject_to_enroll_model')->getClasses();
        $this->view('student/enrollment/subject_to_enroll',$res);

    }

    public function enroll_records($gid, $sid)
    {
        $result = $this->model('subject_to_enroll_model')->enroll_rec(5,$gid,$sid);
        if($result)
        {
            header("location:" . BASEURL . "st_courses");
        }
        else
        {
            echo "failed!" ;
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



