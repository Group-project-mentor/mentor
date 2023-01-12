<?php

class RcReport extends Controller
{
    private $user = "rc";

    public function index()
    {
        $this->view('resourceCtr/reportIssue/reportIssue');
    }

    public function addReport()
    {
        $this->view('resourceCtr/reportIssue/reportDesc');
    }
}
