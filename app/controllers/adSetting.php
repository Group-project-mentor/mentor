<?php

class AdSetting extends Controller{
    public function __construct()
    {
        // sessionValidator();
    }

    public function index()
    {
        $this->view('admin/setting');
    }

}


?>