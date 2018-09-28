<?php
//Este controlador lo hara Samuel
require_once 'Models/Alumno.php';

class AlumnoController{
    
    private $model;
    
    public function __CONSTRUCT(){
        $this->model = new Alumno();
    } 

    public function Index(){
        require_once 'Views/header.php';
        require_once 'Views/Alumno/alumno.php';
        require_once 'Views/footer.php';
    }

    public function Crud(){
        $alm = new Alumno();
        
        if(isset($_REQUEST['id'])){
            $alm = $this->model->Obtener($_REQUEST['id']);
        }
        
        require_once 'Views/header.php';
        require_once 'Views/Alumno/alumno-editar.php';
        require_once 'Views/footer.php';
    }
    
    public function Guardar(){
        $alm = new Alumno();        
        $alm->id = $_REQUEST['id'];
        $alm->Nombre = $_REQUEST['Nombre'];
        $alm->Apellido = $_REQUEST['Apellido'];
        $alm->Genero = $_REQUEST['Genero'];
        $alm->FechaNacimiento = $_REQUEST['FechaNacimiento'];
        $alm->Telefono = $_REQUEST['Telefono'];
        $alm->Estado = $_REQUEST['Estado'];

        $alm->id > 0 
            ? $this->model->Actualizar($alm)
            : $this->model->Registrar($alm);
        
        header('Location: index.php');
    }
    
    public function Eliminar(){
        if(isset($_REQUEST['id'])){
            $this->model->Eliminar($_REQUEST['id']);
            header('Location: index.php');
        }        
    }
}