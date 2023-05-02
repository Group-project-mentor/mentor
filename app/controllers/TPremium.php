<?php

class TPremium extends Controller{
    private $user = "tch";

    public function __construct()
    {
        sessionValidator();
        $this->userValidate($this->user);
        flashMessage();

       
    }

    
    public function premiumPlan(){
        $this->view('Teacher/Premium/premiumPlan');
    }

    public function savePremium()
    {
        $name = $_POST['card_holder_name'];
        $amount = $_POST['payhere_amount'];
        $email = $_POST['custom_2'];
        $this->model("payments")->savePremium($name, $email, $amount);
    }
}

?>