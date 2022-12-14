<?php

class Enrolled_subject extends Controller
{
    public function index()
    {
        sessionValidator();
        $this->hasLogged();
        $res=$this->model('enrolled_subject_model')->getClasses2();
        $this->view('student/enrollment/enrolled_subject',$res);

    }

    private function hasLogged()
    {
        if (!isset($_SESSION['user'])) {
            header("location:" . BASEURL . "login");
        }

    }
}


?>



