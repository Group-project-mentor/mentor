<?php

class Controller
{
    public function view($view, $data = [])
    {
        if (file_exists('../app/views/' . $view . '.php')) {
            require_once '../app/views/' . $view . '.php';
        } else {
            die('View does not exist');
        }
    }

    public function model($model, $path = null)
    {
        if (empty($path)) {
            require_once '../app/models/' . $model . '.php';
        } else {
            require_once '../app/models/' . $path . '.php';
        }
        return new $model();
    }

    public function userValidate($user)
    {
        if (!isset($_SESSION['usertype']) or !($_SESSION['usertype'] == $user)) {
            header("location:" . BASEURL . "home");
        }
        elseif (empty($_SESSION['usertype'])){
            header("location:" . BASEURL . "logout");
        }
    }

    public function notify($user, $message, $type=null, $validity=null){
        // if(preg_match('/^\d+(Y,y)$/', $validity))
        //     $validity = date('Y-m-d', strtotime('+1 year'));
        // elseif(preg_match('/^\d+(M,m)$/', $validity))
        //     $validity = date('Y-m-d', strtotime('+1 month'));
        // elseif(preg_match('/^\d+(D,d)$/', $validity))
        //     $validity = date('Y-m-d', strtotime('+1 day'));
        
        $res = $this->model('NotificationModel')->notify($user, $message, $type, $validity);
        return $res;
    }

}
