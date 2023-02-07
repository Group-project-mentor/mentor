<?php

class St_other extends Controller
{
    public function __construct()
    {
        sessionValidator();
        $this->hasLogged();
    }
    
    public function index()
    {
        $this->view('student/enrollment/st_other');

    }

    public function st_other_do()
    {
        $this->view('student/enrollment/st_other_do');

    }

    public function st_other_down()
    {
        $this->view('student/enrollment/st_other_down');

    }

    private function hasLogged()
    {
        if (!isset($_SESSION['user'])) {
            header("location:" . BASEURL . "login");
        }

    }
}

?>



