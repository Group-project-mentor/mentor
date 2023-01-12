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
        if (!isset($_SESSION['usertype']) and !($_SESSION['usertype'] == $user)) {
            header("location:" . BASEURL . "home");
        }
    }

}
