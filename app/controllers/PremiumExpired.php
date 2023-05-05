<?php

class PremiumExpired extends Controller
{
    public function __construct()
    {
    }

    public function index(){
        $this->view('Teacher/Premium/premiumExpired');
    }

}