<?php

class TProfile extends Controller{
    private $user = "tch";

    public function __construct()
    {
        sessionValidator();
        $this->userValidate($this->user);
        flashMessage();
    }


    public function profile(){
        $this->view('Teacher/Profile/profile');
    }   

    public function profileImg(){
        $this->view('Teacher/Profile/profileImage');
    } 
}

?>