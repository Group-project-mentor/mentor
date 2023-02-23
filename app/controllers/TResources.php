<?php

class TResources extends Controller{
    private $user = "tch";

public function __construct()
{
    sessionValidator();
    $this->userValidate($this->user);
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