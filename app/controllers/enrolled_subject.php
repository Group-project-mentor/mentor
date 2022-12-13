<?php

class enrolled_subject extends Controller
{
    public function index()
    {
        sessionValidator();
        $this->hasLogged();
        $this->view('student/enrollment/enrolled_subject');

    }

    private function hasLogged()
    {
        if (!isset($_SESSION['user'])) {
            header("location:" . BASEURL . "login");
        }

    }
}


?>



