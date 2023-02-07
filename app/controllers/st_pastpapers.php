<?php

class St_pastpapers extends Controller
{
    public function __construct()
    {
        sessionValidator();
        $this->hasLogged();
    }
    
    public function index()
    {
        $this->view('student/enrollment/st_pastpapers');
    }

    public function st_pastpaper_do()
    {
        $this->view('student/enrollment/st_pastpaper_do');
    }

    public function st_pastpaper_down()
    {
        $this->view('student/enrollment/st_pastpaper_down');
    }

    private function hasLogged()
    {
        if (!isset($_SESSION['user'])) {
            header("location:" . BASEURL . "login");
        }

    }
}

?>



