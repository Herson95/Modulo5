<?php
//Este controlador lo hara Juan Carlos
require_once 'Models/Asignatura.php';

class AsignaturaController{
    
    private $model;
    
    public function __CONSTRUCT(){
        $this->model = new Asignatura();
    }
    
    public function Index(){
        require_once 'Views/header.php';
        require_once 'Views/Asignatura/asignatura.php';
        require_once 'Views/footer.php';
    }

    public function Crud(){
        $asig = new Asignatura();

        if(isset($_REQUEST['AsignaturaID'])){
            $asig = $this->model->Obtener($_REQUEST['AsignaturaID']);
        }

        require_once 'Views/header.php';
        require_once 'Views/Asignatura/asignatura-editar.php';
        require_once 'Views/footer.php';
    }

    public function Guardar(){
        $asig = new Asignatura();
        $asig->AsignaturaID = $_REQUEST['AsignaturaID'];
        $asig->Asignatura = $_REQUEST['Asignatura'];
        $asig->UV = $_REQUEST['UV'];

        $asig->AsignaturaID > 0 
            ? $this->model->Actualizar($asig)
            : $this->model->Registrar($asig);
        
        header('Location: index.php');
    }

    public function Eliminar(){
        if(isset($_REQUEST['AsignaturaID'])){
            $this->model->Eliminar($_REQUEST['AsignaturaID']);
            header('Location: index.php');
        }
    }
}