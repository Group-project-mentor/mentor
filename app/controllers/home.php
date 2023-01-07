<?php

class Home extends Controller
{
    public function index()
    {
        $this->view('home/index');
    }

    private function hasLogged()
    {
        if (!isset($_SESSION['user'])) {
            header("location:" . BASEURL . "login");
        }

    }
}

?>