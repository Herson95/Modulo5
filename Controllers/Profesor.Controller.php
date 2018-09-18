<?php
//Este controlador lo hara Adonis
require_once 'Models/Profesor.php';

class ProfesorController{
    
    private $model;
    
    public function __CONSTRUCT(){
        $this->model = new Profesor();
    } 
}