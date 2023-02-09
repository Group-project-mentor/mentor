<?php

class TInsideClass extends Controller{
    public function __construct()
    {
        session_start();
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