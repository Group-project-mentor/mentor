<?php

class AdActivitylog extends Controller{
    public function __construct()
    {
        // sessionValidator();
    }

    public function index()
    {
        $this->view('admin/activitylog');
    }

}


?>