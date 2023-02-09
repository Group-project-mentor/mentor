<?php

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


?>