<?php

class AdVerification extends Controller{
    public function __construct()
    {
        // sessionValidator();
    }

    public function index()
    {
        $this->view('admin/verification');
    }

}

class AdOtherverify extends Controller{
    public function __construct()
    {
        // sessionValidator();
    }

    public function index()
    {
        $this->view('admin/resourceVerificationOther');
    }

}

class AdPdfsverify extends Controller{
    public function __construct()
    {
        // sessionValidator();
    }

    public function index()
    {
        $this->view('admin/resourceVerificationPdf');
    }

}


class AdPstpprverify extends Controller{
    public function __construct()
    {
        // sessionValidator();
    }

    public function index()
    {
        $this->view('admin/resourceVerificationPstppr');
    }

}

class AdQuizzverify extends Controller{
    public function __construct()
    {
        // sessionValidator();
    }

    public function index()
    {
        $this->view('admin/resourceVerificationQuizzes');
    }

}

class AdVideoverify extends Controller{
    public function __construct()
    {
        // sessionValidator();
    }

    public function index()
    {
        $this->view('admin/resourceVerificationVideos');
    }

}


?>