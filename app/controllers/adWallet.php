<?php

class AdWallet extends Controller{
    public function __construct()
    {
        // sessionValidator();
    }

    public function index()
    {
        $this->view('admin/wallet');
    }

}


?>