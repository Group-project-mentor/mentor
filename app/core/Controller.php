<?php

class Controller
{

    public function model($model, $path = null)
    {
        if(empty($path)){
            require_once '../app/models/' . $model . '.php';
        }else{
            require_once '../app/models/' . $path . '.php';
        }
        return new $model();
    }

    public function view($view, $data = [])
    {
        if (file_exists('../app/views/' . $view . '.php')) {
            require_once '../app/views/' . $view . '.php';
        } else {
            die('View does not exist');
        }
    }

}
