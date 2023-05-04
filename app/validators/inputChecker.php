<?php

// ? validators for user inputs

function validateName($txt)
{
    if (preg_match("/^[a-zA-Z ]*$/", $txt)) {
        return true;
    } else {
        return false;
    }
}

// function validateNIC($nic)
// {
//     if (preg_match("/^[0-9]{9}[vV]$/", $nic)) {
//         return true;
//     } else {
//         return false;
//     }
// }

function validateNumber($num)
{
    if (preg_match("/^[0-9]*$/", $num)) {
        return true;
    } else {
        return false;
    }
}

function validateEmail($email)
{
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return true;
    } else {
        return false;
    }
}

function validateTelNo($tel)
{
    if (preg_match("/^(?:\+94|0)[1-9]\d{8}$/", $tel)) {
        return true;
    } else {
        return false;
    }
}

function validateCSText($txt)
{
    if (preg_match("/^[a-zA-Z0-9]+(,[a-zA-Z0-9]+)*$/", $txt)) {
        return true;
    } else {
        return false;
    }
}

function nFirstChars($text, $length)
{
    if(strlen($text) > $length){
        return substr($text, 0, $length-1);
    }
    else{
        return $text;
    }
}

function sanitizeFileName($name){
    $skip_array = array('/', '\\', ':','*','\"','<','>','|');
    $text = str_replace($skip_array, '', $name);
    $text = str_replace(' ', '_', $name);
    return $text;
}