<?php

class St_documents extends Controller
{
    public function index()
    {
        sessionValidator();
        $this->hasLogged();
        $this->view('student/enrollment/st_documents');

    }

    private function hasLogged()
    {
        if (!isset($_SESSION['user'])) {
            header("location:" . BASEURL . "login");
        }

    }
}

?>



