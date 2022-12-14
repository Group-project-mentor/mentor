<?php

class St_pastpapers extends Controller
{
    public function index()
    {
        sessionValidator();
        $this->hasLogged();
        $this->view('student/enrollment/st_pastpapers');

    }

    private function hasLogged()
    {
        if (!isset($_SESSION['user'])) {
            header("location:" . BASEURL . "login");
        }

    }
}

?>



