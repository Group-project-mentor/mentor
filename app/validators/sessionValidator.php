<?php 

function sessionValidator(){
    session_start();
    if (!isset($_SESSION['user'])) {
        header("location:" . BASEURL . "login");
    }
}

function userTypeValidator($user){
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    if (isset($_SESSION['usertype']) and $_SESSION['usertype'] == $user){
        return true;
    }else{
        return false;
    }
}


?>