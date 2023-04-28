<?php

class St_billing extends Controller
{
    public function __construct()
    {
        sessionValidator();
        $this->hasLogged();
    }

    public function index()
    {
        $this->view('student/privatemode/st_billing');

    }

    public function st_billing_details()
    {
        $this->view('student/privatemode/st_billing_details');

    }

    public function st_billing_history()
    {
        $this->view('student/privatemode/st_billing_history');

    }

    public function st_billing_withdrow()
    {
        $this->view('student/privatemode/st_billing_withdrow');

    }

    public function st_billing_change_plan()
    {
        $this->view('student/privatemode/st_billing_change_plan');

    }

    private function hasLogged()
    {
        if (!isset($_SESSION['user'])) {
            header("location:" . BASEURL . "login");
        }

    }
}

?>



