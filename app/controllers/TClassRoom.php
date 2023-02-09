<?php

class TClassRoom extends Controller{
    public function __construct()
    {
        session_start();
        flashMessage();
    }

    public function createClass(){
        $this->view('Teacher/classRoom/createclass');
    }   
}

?>