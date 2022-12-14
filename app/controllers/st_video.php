<?php

class St_video extends Controller
{
    public function index()
    {
        sessionValidator();
        $this->hasLogged();
        $this->view('student/enrollment/st_video');

    }

    private function hasLogged()
    {
        if (!isset($_SESSION['user'])) {
            header("location:" . BASEURL . "login");
        }

    }
}


?>



