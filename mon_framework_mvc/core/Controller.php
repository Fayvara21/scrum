<?php
// core/Controller.php

class Controller
{
    public function model($model)
    {
        require_once ROOT . '/app/models/' . $model . '.php';
        return new $model();
    }

    public function view($view, $data = [])
    {
        require_once ROOT . '/app/views/' . $view . '.php';
    }
}