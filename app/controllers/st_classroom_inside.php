<?php

class St_classroom_inside extends Controller
{
    public function index()
    {
        sessionValidator();
        $this->hasLogged();
        $this->view('student/privatemode/st_classroom_inside');

    }

    private function hasLogged()
    {
        if (!isset($_SESSION['user'])) {
            header("location:" . BASEURL . "login");
        }

    }
}

?>



