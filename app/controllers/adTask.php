<?php

class AdTask extends Controller{
    public function __construct()
    {
        // sessionValidator();
    }

    public function index()
    {
        //sessionValidator();        
        $this->view('admin/task');
    }

}


?>