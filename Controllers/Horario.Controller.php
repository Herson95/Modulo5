<?php
//Este controlador lo hara Cristina
require_once 'Models/Horario.php';

class HorarioController
{

    private $model;

    public function __CONSTRUCT()
    {
        $this->model = new Horario();
    }

    public function Index()
    {
        session_start();

        require_once 'Views/Menu/menu.php';
        require_once 'Views/header.php';
        require_once 'Views/Horario/horario.php';
        require_once 'Views/footer.php';
    }

    public function Crud()
    {
        $hro = new Horario();
        if (isset($_REQUEST['HorarioID'])) {
            $hro = $this->model->Obtener($_REQUEST['HorarioID']);
        }
        session_start();

        require_once 'Views/Menu/menu.php';
        require_once 'Views/header.php';
        require_once 'Views/Horario/horario-editar.php';
        require_once 'Views/footer.php';
    }

    public function Guardar()
    {
        $hro = new Horario();
        $hro->HorarioID = $_REQUEST['HorarioID'];
        $hro->Dia = $_REQUEST['Dia'];
        $hro->Hora_inicio = $_REQUEST['Hora_inicio'];
        $hro->Hora_fin = $_REQUEST['Hora_fin'];

        $hro->HorarioID > 0
        ? $this->model->Actualizar($hro)
        : $this->model->Registrar($hro);

        $this->Index();

    }

    public function Eliminar()
    {
        if (isset($_REQUEST['HorarioID'])) {
            $this->model->Eliminar($_REQUEST['HorarioID']);
            $this->Index();
        }
    }
}