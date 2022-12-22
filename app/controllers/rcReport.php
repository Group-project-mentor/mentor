<?php

class RcReport extends Controller
{
    public function index()
    {
        $this->view('resourceCtr/reportIssue/reportIssue');
    }

    public function addReport()
    {
        $this->view('resourceCtr/reportIssue/reportDesc');
    }
}
