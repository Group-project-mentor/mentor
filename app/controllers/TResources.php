<?php

class TResources extends Controller{
    public function __construct()
    {
        session_start();
        flashMessage();
    }

    public function forum(){
        $this->view('Teacher/resources/forum');
    }   

    public function resource(){
        $this->view('Teacher/resources/resource');
    } 

    public function resourceOne(){
        $this->view('Teacher/resources/resourceOne');
    }
}

?>