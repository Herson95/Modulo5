<?php
//Este controlador lo hara Samuel
require_once 'Models/Alumno.php';

class AlumnoController{
    
    private $model;
    
    public function __CONSTRUCT(){
        $this->model = new Alumno();
    } 
}