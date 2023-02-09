<?php

class TProfile extends Controller{
    public function __construct()
    {
        session_start();
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