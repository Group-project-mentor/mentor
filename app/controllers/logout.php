<?php
class Logout
{
    public function index()
    {
        session_start();
        session_unset();
        session_destroy();
        header("location:" . BASEURL . "login");

    }
}
