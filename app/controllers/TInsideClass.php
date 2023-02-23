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

    
}

?>