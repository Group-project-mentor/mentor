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

    public function addTchAction(){
        $id2 = $_POST['teacher_name'];
        $id1 = $_POST['teacher_id'];
        $id3 = $_POST['teacher_privilege'];
        var_dump($id1,$id2,$id3);
        if($this->model('teacher_data')->addExtraTeachersClass($id1,$id2,$id3) ){
            
            header("location:".BASEURL."TInsideClass/inClass");
        }
        else{
            header("location:".BASEURL."TInsideClass/addTr");
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