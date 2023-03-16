<?php

class TInsideClass extends Controller{
    private $user = "tch";

    public function __construct()
    {
        sessionValidator();
        $this->userValidate($this->user);
        flashMessage();
    }


    public function addSt(){
        $this->view('Teacher/insideClass/addStudent');
    }   

    public function addTr(){
        $this->view('Teacher/insideClass/addTeacher');
    }  

    public function addTrNext(){
        $this->view('Teacher/insideClass/addTeacherNext');
    }   

    public function InClass(){
        $this->view('Teacher/insideClass/InsideClass');
    }

    public function createAction(){
        $l_id = $_POST['student_id'];
        var_dump($l_id);
        if($this->model('teacher_data')->addStudentsClass($l_id) ){
            
            header("location:".BASEURL."TInsideClass/inClass");
        }
        else{
            header("location:".BASEURL."TInsideClass/addSt");
        }

    }

    public function getStudentId(){
        $l_id = $_POST['student_id'];
        var_dump($l_id);
        $res = $this->model('teacher_data')->getStudents($l_id);
        $this->view('Teacher/classMembers/membersDetails',array($res));
    }

    
}

?>