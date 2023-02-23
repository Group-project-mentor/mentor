<?php

class TClassRoom extends Controller{
    private $user = "tch";

    public function __construct()
    {
        sessionValidator();
        $this->userValidate($this->user);
        flashMessage();
    }


    public function createClass(){
        $this->view('Teacher/classRoom/createclass');
    }   
}

?>