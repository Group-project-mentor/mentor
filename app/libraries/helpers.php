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


// ? Create a folder and save the file
function saveFile($tempLocation ,$fileName, $type, $folder1=null, $folder2=null): bool
{
    $fileDest = findFileDest($type, $folder1, $folder2, $fileName);
    if(!file_exists($fileDest)){
        if($type == "videos") {
            return rename($tempLocation, $fileDest);
        }else{
            return move_uploaded_file($tempLocation, $fileDest);
        }
    }else{
        return false;
    }
}

function TsaveFile($tempLocation ,$fileName, $type, $folder1=null): bool
{
    $fileDest = TfindFileDest($type, $folder1, $fileName);
    if(!file_exists($fileDest)){
        if($type == "videos") {
            
            return rename($tempLocation, $fileDest);
        }else{
            return move_uploaded_file($tempLocation, $fileDest);
        }
    }else{
        return false;
    }
}

function updateFile($tempLocation, $newFileName, $oldFileName, $type, $folder1=null, $folder2=null): bool
{
    $flag = saveFile($tempLocation, $newFileName, $type, $folder1, $folder2);
    $fileDest = findFileDest($type, $folder1, $folder2, $oldFileName);
    if(!empty($oldFileName)){
        if(file_exists($fileDest)){
            return ($flag and unlink($fileDest));
        }else{
            return false;
        }
    }else{
        return true;
    }
}

function TupdateFile($tempLocation, $newFileName, $oldFileName, $type, $folder1=null): bool
{
    $flag = TsaveFile($tempLocation, $newFileName, $type, $folder1);
    $fileDest = TfindFileDest($type, $folder1,  $oldFileName);
    if(file_exists($fileDest)){
        return ($flag and unlink($fileDest));
    }else{
        return false;
    }
}

function findFileDest($type, $folder1, $folder2, $fileName): string
{
    $fileDest = "public_resources/$type/";
    if ($folder1 != null) {
        $fileDest = $fileDest . $folder1;
        if (!is_dir($fileDest)) {
            mkdir($fileDest);
        }
        $fileDest = $fileDest . "/";
        if ($folder2 != null) {
            $fileDest = $fileDest . $folder2;
            if (!is_dir($fileDest)) {
                mkdir($fileDest);
            }
            $fileDest = $fileDest . "/";
        }
    }
    return $fileDest . $fileName;
}

function TfindFileDest($type, $folder1, $fileName): string
{
    $fileDest = "private_resources/$type/";
    if ($folder1 != null) {
        $fileDest = $fileDest . $folder1;
        if (!is_dir($fileDest)) {
            mkdir($fileDest);
        }
        $fileDest = $fileDest."/";
    }
    return $fileDest . $fileName;
}

function deleteFile($fileName, $type, $folder1=null, $folder2=null):bool
{
    $fileDest = "public_resources/$type/";
    if($folder1!=null){
        if ($folder2 != null){
            $fileDest = $fileDest.$folder1."/".$folder2."/".$fileName;
            if(file_exists($fileDest)){
                return unlink($fileDest);
            }else{
                return false;
            }
        }
        $fileDest = $fileDest.$folder1."/".$fileName;
        if(file_exists($fileDest)){
            return unlink($fileDest);
        }else{
            return false;
        }
    }
    $fileDest = $fileDest.$fileName;
    if(file_exists($fileDest)){
        return unlink($fileDest);
    }else{
        return false;
    }
}

function TdeleteFile($fileName, $type, $folder1=null):bool
{
    $fileDest = "private_resources/$type/";
    if($folder1!=null)
    {
        $fileDest = $fileDest.$folder1."/".$fileName;
        if(!file_exists($fileDest)){
            return unlink($fileDest);
        }else{
            return false;
        }
    }
    $fileDest = $fileDest.$fileName;
    if(!file_exists($fileDest)){
        return unlink($fileDest);
    }else{
        return false;
    }
}

function checkFileDest($mainDest, $gid, $sid, $fileName){
    $fileDest = "private_resources/$mainDest/$gid/$sid/$fileName";
    return file_exists($fileDest);
}

function getMonthName($monthNumber) {
    return date("F", mktime(0, 0, 0, $monthNumber, 1));
}

function getUnique($uid): string
{
    $r= str_pad($uid%1000, 3, '0', STR_PAD_LEFT);
    return uniqid().$r;
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

function TtempFileRemover(){
//    if (session_status() == PHP_SESSION_NONE) {
//        session_start();
//    }
    if(isset($_SESSION['temporary_file']) and $_SESSION['tempTag']){
        $_SESSION['tempTag'] = false;
    }
    elseif(isset($_SESSION['temporary_file']) and !$_SESSION['tempTag']){
        unlink('private_resources/temp/'.$_SESSION['temporary_file']);
        unset($_SESSION['temporary_file']);
    }
}

function sanitizeText($text){
    $text = trim($text);
    $text = stripslashes($text);
    return htmlspecialchars($text);
}

function isNumber($v, $replace = 0){
    if(is_int($v)){
        return $v;
    }else{
        return $replace;
    }
}


tempFileRemover();
TtempFileRemover();