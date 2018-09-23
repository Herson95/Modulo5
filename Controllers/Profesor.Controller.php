<?php
//Este controlador lo hara Adonis
require_once 'Models/Profesor.php';

class ProfesorController{
    
    private $model;
    
    public function __CONSTRUCT(){
        $this->model = new Profesor();
    }
    
    public function Index(){
        require_once 'Views/header.php';
        require_once 'Views/Profesor/profesor.php';
        require_once 'Views/footer.php';
    }
    
    public function Crud(){
        $prof = new Profesor();
        
        if(isset($_REQUEST['ProfesorID'])){
            $prof = $this->model->Obtener($_REQUEST['ProfesorID']);
        }
    
        require_once 'Views/header.php';
        require_once 'Views/Profesor/profesor-editar.php';
        require_once 'Views/footer.php';
    }
    
    public function Guardar(){
        $prof = new Profesor();        
        $prof->id = $_REQUEST['ProfesorID'];
        $prof->Nombre = $_REQUEST['Nombre'];
        $prof->Apellido = $_REQUEST['Apellido'];
        $prof->Dui = $_REQUEST['Dui'];
        $prof->Telefono = $_REQUEST['Telefono'];
        $prof->Estado = $_REQUEST['Estado'];

        $prof->id > 0 
            ? $this->model->Actualizar($prof)
            : $this->model->Registrar($prof);
        
        header('Location: index.php');
    }
    
    public function Eliminar(){
        $this->model->Eliminar($_REQUEST['ProfesorID']);
        header('Location: index.php');
    }
}