<?php

class privateclass extends Controller
{
    public function index()
    {
        
    }

    public function create()
    {
        $this->view('Teacher/createclass');
    }

    public function report()
    {
        $this->view('Teacher/reportIssue');
    }

    public function reportText()
    {
        $this->view('Teacher/reportIssueOne');
    }

    public function insideClass()
    {
        $this->view('Teacher/insideClass');
    }

    public function addTeacher()
    {
        $this->view('Teacher/addTeacher');
    }

    public function addTeacherNext()
    {
        $this->view('Teacher/addTeacherNext');
    }

    public function addStudent()
    {
        $this->view('Teacher/addStudent');
    }

    public function generateReport()
    {
        $this->view('Teacher/generateReport');
    }

    public function generateReportOne()
    {
        $this->view('Teacher/generateReportOne');
    }

    public function profile()
    {
        $this->view('Teacher/profile');
    }

    public function addResources()
    {
        $this->view('Teacher/resource');
    }

    public function addResourcesOne()
    {
        $this->view('Teacher/resourceOne');
    }

    public function forum()
    {
        $this->view('Teacher/forum');
    }

    public function bmc()
    {
        $this->view('Teacher/BMC');
    }

    public function bmcNext()
    {
        $this->view('Teacher/BMC2');
    }
    


    public function createAction(){
        $l_id = $this->model('teacher_data')->getLastClassID();
        var_dump($l_id);
        if($this->model('teacher_data')->addClass($l_id,$_POST['class_name']) and $this->model('teacher_data')->teacherHasClass($l_id) ){
            
            header("location:".BASEURL."home");
        }
        else{
            header("location:".BASEURL."privateclass/create/1");
        }

    }
}

?>