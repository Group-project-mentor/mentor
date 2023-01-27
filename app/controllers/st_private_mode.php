<?php

class St_private_mode extends Controller
{
    public function __construct()
    {
        sessionValidator();
        $this->hasLogged();
    }

    public function index()
    {
        $this->view('student/privatemode/st_private_mode');
    }

    public function st_classroom_inside()
    {
        $this->view('student/privatemode/st_classroom_inside');
    }

    public function st_join_classes()
    {
        $this->view('student/privatemode/st_join_classes');
    }

    private function hasLogged()
    {
        if (!isset($_SESSION['user'])) {
            header("location:" . BASEURL . "login");
        }
    }
}
