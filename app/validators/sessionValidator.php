<?php 

function sessionValidator(){
    session_start();
    if (!isset($_SESSION['user'])) {
        header("location:" . BASEURL . "login");
    }
}


?>