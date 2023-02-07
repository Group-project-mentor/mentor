<?php

class St_buy extends Controller
{
    public function __construct()
    {
        sessionValidator();
        $this->hasLogged();
    }

    public function index()
    {
        $this->view('student/report/st_buy');

    }

    public function st_buy_in()
    {
        $this->view('student/report/st_buy_in');

    }

    private function hasLogged()
    {
        if (!isset($_SESSION['user'])) {
            header("location:" . BASEURL . "login");
        }

    }
}

?>



