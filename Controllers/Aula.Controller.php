<?php
//Este controlador lo hara Cristina
require_once 'Models/Aula.php';

class AulaController{
    
    private $model;
    
    public function __CONSTRUCT(){
        $this->model = new Alumno();
    } 
}