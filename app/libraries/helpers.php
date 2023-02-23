<?php

function flashMessageArray($name = null, $message=null){
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    if(empty($name) and empty($message)){
        $_SESSION['messages'] = array();
        $_SESSION['msgTag'] = false;
    }else{
        if(!empty($name) and !empty($message)){
            $_SESSION['messages'][$name] = $message;
            $_SESSION['msgTag'] = true;
        }
        elseif (!empty($name) and isset($_SESSION['messages'][$name]) and $_SESSION['msgTag']){
            $_SESSION['msgTag'] = false;
        }
        elseif (!empty($name) and isset($_SESSION['messages'][$name]) and !$_SESSION['msgTag']){
            unset($_SESSION['messages']);
        }
    }
}

function flashMessage($message=null){
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    if(empty($message)){
        if(isset($_SESSION['message']) and $_SESSION['msgTag']){
            $_SESSION['msgTag'] = false;
        }
        elseif(isset($_SESSION['message']) and !$_SESSION['msgTag']){
            unset($_SESSION['message']);
        }
    }
    else{
        $_SESSION['message'] = $message;
        $_SESSION['msgTag'] = true;
    }
}

function tempFileRemover(){
//    if (session_status() == PHP_SESSION_NONE) {
//        session_start();
//    }
    if(isset($_SESSION['temporary_file']) and $_SESSION['tempTag']){
        $_SESSION['tempTag'] = false;
    }
    elseif(isset($_SESSION['temporary_file']) and !$_SESSION['tempTag']){
        unlink('public_resources/temp/'.$_SESSION['temporary_file']);
        unset($_SESSION['temporary_file']);
    }
}

tempFileRemover();