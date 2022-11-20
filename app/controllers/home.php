<?php

class Home extends Controller
{
    public function index()
    {
        sessionValidator();
        $this->hasLogged();
        $this->view('resourceCtr/home/index');

    }

    private function hasLogged()
    {
        if (!isset($_SESSION['user'])) {
            header("location:" . BASEURL . "login");
        }

    }
}
