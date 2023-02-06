<?php

class AdAddnewadmin extends Controller{
    public function __construct()
    {
        // sessionValidator();
    }

    public function index($msg=null)
    {
        $this->view('admin/addNewAdmin',$msg);
    }


    public function add()
    {
        $password = $this->randompassword();
        $name = $_POST['admin-name'];
        $email = $_POST['admin-mail'];

        $res = $this->model('ad_admin')->addAdmin($name,$email,$password);

        if ($res) {
            header("location:" . BASEURL . "adhumanResource#/1");

        }
        else{
            header("location:" . BASEURL . "adAddnewadmin");

        }




    }

    private function randompassword(){
        $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
        $pass = array(); //remember to declare $pass as an array
        $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
        for ($i = 0; $i < 8; $i++) {
            $n = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
        }
        return implode($pass); //turn the array into a string
    }


}

?>