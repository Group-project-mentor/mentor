<?php

class St_billing extends Controller
{

    // private string $user = "sp";
    // private string $table1 = "sponsorStModel";

    public function __construct(){
        sessionValidator();
        // $this->userValidate($this->user);
        // flashMessage();
    }

    public function index()
    {
        $result = $this->model("st_billing_model")->getstudentBillingDEtails(2,7);
        var_dump($result);
        $this->view('student/billing/st_billing', array($result));
    }

    
}

?>



