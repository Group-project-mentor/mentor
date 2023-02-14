<?php

class TClassMembers extends Controller{
    private $user = "tch";

    public function __construct()
    {
        sessionValidator();
        $this->userValidate($this->user);
        flashMessage();
    }


    public function changeHost(){
        $this->view('Teacher/classMembers/changeHost');
    }   

    public function changeHost2(){
        $this->view('Teacher/classMembers/changeHost2');
    }  

    public function changeHost3(){
        $this->view('Teacher/classMembers/changeHost3');
    }   

    public function memDetails(){
        $this->view('Teacher/classMembers/membersDetails');
    }

    public function restrictSt(){
        $this->view('Teacher/classMembers/restrictStudent');
    }
}

?>