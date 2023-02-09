<?php

class AdWithdraw extends Controller{
    public function __construct()
    {
        // sessionValidator();
    }

    public function index()
    {
        $this->view('admin/withdraw1');
    }

}


?>