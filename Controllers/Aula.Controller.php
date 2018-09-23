<?php
//Este controlador lo hara Cristina
require_once 'Models/Aula.php';

class AulaController{
    
    private $model;
    
    public function __CONSTRUCT(){
        $this->model = new Aula();
    }

public function Index(){
    require_once 'Views/header.php';
    require_once 'Views/Aula/aula.php';
    require_once 'Views/footer.php';
}

public function Crud(){
    $aul = new Aula();
    if(isset($_REQUEST['AulaID'])){
        $aul = $this->model->Obtener($_REQUEST['AulaID']);
    }
    require_once 'Views/header.php';
    require_once 'Views/Aula/aula-editar.php';
    require_once 'Views/footer.php';
}

public function Guardar(){
    $aul = new Aula();        
    $aul->AulaID = $_REQUEST['AulaID']; 
    $aul->Aula = $_REQUEST['Aula'];
    $aul->Capacidad = $_REQUEST['Capacidad'];

    $aul->AulaID > 0 
            ? $this->model->Actualizar($aul)
            : $this->model->Registrar($aul);
        
        header('Location: index.php');

}

public function Eliminar(){
        if(isset($_REQUEST['AulaID'])){
            //echo $_REQUEST['id'];
            $this->model->Eliminar($_REQUEST['AulaID']);
            header('Location: index.php');
        }
    }
}