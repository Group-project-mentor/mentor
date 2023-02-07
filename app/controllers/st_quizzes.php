<?php

class St_quizzes extends Controller
{
    public function __construct()
    {
        sessionValidator();
        $this->hasLogged();
    }

    public function index()
    {
        $this->view('student/enrollment/st_quizzes');

    }

    public function st_quizzes_do()
    {
        $this->view('student/enrollment/st_quizzes_do');
    }

    private function hasLogged()
    {
        if (!isset($_SESSION['user'])) {
            header("location:" . BASEURL . "login");
        }

    }
}


?>



