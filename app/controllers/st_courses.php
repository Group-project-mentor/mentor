<?php

class St_courses extends Controller
{
    public function index()
    {
        sessionValidator();
        $this->hasLogged();
        $res=$this->model('st_courses_model')->getClasses();
        $res2=$this->model('st_courses_model')->getClasses2();
        $this->view('student/enrollment/st_courses',array($res,$res2));


    }

    private function hasLogged()
    {
        if (!isset($_SESSION['user'])) {
            header("location:" . BASEURL . "login");
        }

    }
}


?>



