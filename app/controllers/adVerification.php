<?php

class adVerification extends Controller{
    public function __construct()
    {
        // sessionValidator();
    }

    private function hasLogged() {
        if (!isset($_SESSION['user'])) {
            header("location:" . BASEURL . "login");
        }

    }

    public function index()
    {
        $this->view('admin/verification');
    }
    
    public function others() {

        sessionValidator();
        $this->hasLogged();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
           
        }

        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            
            $this->view('admin/resourceVerificationOther');

        }

    }
}

// class AdOtherverify extends Controller{
//     public function __construct()
//     {
//         // sessionValidator();
//     }

//     public function index()
//     {
//         $this->view('admin/resourceVerificationOther');
//     }

// }

// class AdPdfsverify extends Controller{
//     public function __construct()
//     {
//         // sessionValidator();
//     }

//     public function index()
//     {
//         $this->view('admin/resourceVerificationPdf');
//     }

// }


// class AdPstpprverify extends Controller{
//     public function __construct()
//     {
//         // sessionValidator();
//     }

//     public function index()
//     {
//         $this->view('admin/resourceVerificationPstppr');
//     }

// }

// class AdQuizzverify extends Controller{
//     public function __construct()
//     {
//         // sessionValidator();
//     }

//     public function index()
//     {
//         $this->view('admin/resourceVerificationQuizzes');
//     }

// }

// class AdVideoverify extends Controller{
//     public function __construct()
//     {
//         // sessionValidator();
//     }

//     public function index()
//     {
//         $this->view('admin/resourceVerificationVideos');
//     }

// }


// ?>