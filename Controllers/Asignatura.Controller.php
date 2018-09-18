<?php
//Este controlador lo hara Juan Carlos
require_once 'Models/Asignatura.php';

class AsignaturaController{
    
    private $model;
    
    public function __CONSTRUCT(){
        $this->model = new Asignatura();
    } 
}