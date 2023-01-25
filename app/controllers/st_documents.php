<?php

class St_documents extends Controller
{
    public function __construct()
    {
        sessionValidator();
        $this->hasLogged();
    }
    
    public function index()
    {
        $this->view('student/enrollment/st_documents');

    }

    public function st_document_do()
    {
        $this->view('student/enrollment/st_document_do');

    }

    public function st_documents_down()
    {
        $this->view('student/enrollment/st_documents_down');

    }

    private function hasLogged()
    {
        if (!isset($_SESSION['user'])) {
            header("location:" . BASEURL . "login");
        }

    }
}

?>



