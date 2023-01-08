<?php

class Home extends Controller
{
    public function index()
    {
        $res = $this->model('teacher_data')->getClasses();
        $this->view('Teacher/classroom',$res);
    }
}

?>