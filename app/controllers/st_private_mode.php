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
        $gid = $_SESSION['id'] ;
        $res=$this->model('st_private_mode_model')->getClasses($gid);
        // $res2=$this->model('st_private_mode_model')->getClasses2($gid, $_SESSION['id']);
        $this->view('student/privatemode/st_private_mode',array($res));
    }

    public function st_classroom_inside()
    {
        $this->view('student/privatemode/st_classroom_inside');
    }

    public function st_myclasses()
    {
        $gid = $_SESSION['id'] ;
        $res=$this->model('st_private_mode_model')->getClasses($gid);
        // $res2=$this->model('st_private_mode_model')->getClasses2($gid, $_SESSION['id']);
        $this->view('student/privatemode/st_myclasses',array($res));
    }

    public function st_join_classes()
    {
        $this->view('student/privatemode/st_join_classes');
    }

    public function st_join_token()
    {
        $this->view('student/privatemode/st_join_token');
    }

    public function st_join_request()
    {
        $this->view('student/privatemode/st_join_request');
    }




    private function hasLogged()
    {
        if (!isset($_SESSION['user'])) {
            header("location:" . BASEURL . "login");
        }
    }
}
