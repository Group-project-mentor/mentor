<?php

class Ad_dashboard extends Controller{
    public function __construct()
    {
        // sessionValidator();
    }

    public function index()
    {
        $this->view('admin/dashbord');
    }

}


?>