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
        $sid = $_SESSION['id'] ;
        $res=$this->model('st_private_mode_model')->getClasses($sid);
        $this->view('student/privatemode/st_private_mode',array($res));
    }

    public function st_classroom_inside()
    {
        $this->view('student/enrollment_private/st_classroom_inside');
    }

    public function st_myclasses()
    {
        $sid = $_SESSION['id'] ;
        $res=$this->model('st_private_mode_model')->getClasses($sid);
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

    public function st_join_token_send($token)
    {
        $sid = $_SESSION['id'] ;
        $res=$this->model('st_private_mode_model')->jointoken($token)->class_id;
        $res2=$this->model('st_private_mode_model')->jointokenaddtoDB($sid,$res,$token);
        $res3 = $this->model('st_private_mode_model')->jointokenview($sid,$res,$token)->class_name;
        $_SESSION['class_name'] = $res3 ;
        $this->notify(2,"you have request from the class","request");
        $this->view('student/privatemode/st_join_token_send',array($res2));
    }

    public function st_join_request_update($access,$class_id)
    {
        $sid = $_SESSION['id'] ;
        $res=$this->model('st_private_mode_model')->getClasses3($sid,$access,$class_id);
        $this->view('student/privatemode/st_join_classes',array($res));
    }

    public function st_join_request()
    {
        $sid = $_SESSION['id'] ;
        $res=$this->model('st_private_mode_model')->getClasses1($sid);
        $this->view('student/privatemode/st_join_request',array($res));
    }


    private function hasLogged()
    {
        if (!isset($_SESSION['user'])) {
            header("location:" . BASEURL . "login");
        }
    }
}
