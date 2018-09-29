<?php
require_once 'Models/Asignacion.php';

class AsignacionController
{

    private $model;

    public function __CONSTRUCT()
    {
        $this->model = new Asignacion();
    }

    public function Index()
    {
        session_start();

        require_once 'Views/Menu/menu.php';
        require_once 'Views/header.php';
        require_once 'Views/Asignacion/asignacion.php';
        require_once 'Views/footer.php';
    }

    public function Crud()
    {
        $asignar = new Asignacion();

        if (isset($_REQUEST['RelacionID'])) {
            $asignar = $this->model->Obtener($_REQUEST['RelacionID']);
        }
        session_start();

        require_once 'Views/Menu/menu.php';
        require_once 'Views/header.php';
        require_once 'Views/Asignacion/asignacion-editar.php';
        require_once 'Views/footer.php';
    }

    public function Guardar()
    {
        $asignar = new Asignacion();
        $asignar->RelacionID = $_REQUEST['RelacionID'];
        $asignar->AulaID = $_REQUEST['AulaID'];
        $asignar->AsignaturaID = $_REQUEST['AsignaturaID'];
        $asignar->HorarioID = $_REQUEST['HorarioID'];

        $asignar->RelacionID > 0
        ? $this->model->Actualizar($asignar)
        : $this->model->Registrar($asignar);

        $this->Index();
    }

    public function Eliminar()
    {
        $this->model->Eliminar($_REQUEST['RelacionID']);
        $this->Index();
    }
}