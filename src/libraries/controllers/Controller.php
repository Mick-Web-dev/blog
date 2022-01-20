<?php
namespace Controllers;


abstract class Controller
{
    //Cette classe représente l'idée de ce que doit être le controller
    protected $model;
    protected $modelName;


    public function __construct()
    {
        $this->model = new $this->modelName(); // = new \models\Post()
    }
}