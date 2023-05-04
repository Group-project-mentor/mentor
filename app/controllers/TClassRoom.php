<?php

class TClassRoom extends Controller
{
    private $user = "tch";

    public function __construct()
    {
        sessionValidator();
        $this->userValidate($this->user);
        flashMessage();
    }


    public function createClass()
    {
        $this->view('Teacher/classRoom/createclass');
    }

    public function createAction()
    {
        $l_id = $this->model('teacher_data')->getLastClassID();
        var_dump($l_id);
        if ($this->model('teacher_data')->addClass($l_id, $_POST['class_name']) and $this->model('teacher_data')->teacherHasClass($l_id)) {


            header("location:" . BASEURL . "TClassRoom/allHostClasses");
        } else {
            header("location:" . BASEURL . "TClassRoom/createClass");
        }
    }

    public function allHostClasses()
    {
        unset($_SESSION["cid"]);
        $classes = $this->model("teacher_data")->getClasses($_SESSION['id']);
        $premium=($this->model("premiumModel")->getPremium($_SESSION['id'])->active);
        
        if($premium==1)
        {
            $this->view('Teacher/classRoom/AllHostClass', array($classes));
        }
        else
        {
            $this->view('Teacher/classRoom/AllHostClassesFree', array($classes));
        }
    }

    public function allCoordinateClasses()
    {
        unset($_SESSION["cid"]);
        $classes = $this->model("teacher_data")->getCoordinateClasses($_SESSION['id']);
        $this->view('Teacher/classRoom/AllCoordinateClass', array($classes));
        
    }
}
