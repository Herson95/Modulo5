<?php
//Este modelo lo realizara Adonis
require_once "Config/Database.php";
class Asignacion
{
    private $pdo;

    public $RelacionID;
    public $AulaID;
    public $AsignaturaID;
    public $HorarioID;

    public function __CONSTRUCT()
    {
        try
        {
            $this->pdo = Database::StartUp();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Listar()
    {
        try {
            $result = array();
            $sql = 'CALL READ_ASIGNACION()';
            $stm = $this->pdo->prepare($sql);
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);

        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function ListarAula()
    {
        try {
            $result = array();

            $sql = 'CALL READ_AULA()';
            $stm = $this->pdo->prepare($sql);
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function ListarAsignatura()
    {
        try {
            $result = array();

            $sql = 'CALL READ_ASIGNATURA()';
            $stm = $this->pdo->prepare($sql);
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function ListarHorario()
    {
        try {
            $result = array();

            $sql = 'CALL READ_HORARIO_SELECT()';
            $stm = $this->pdo->prepare($sql);
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Obtener($RelacionID)
    {
        try {
            $sql = ' CALL READ_ASIGNACION_ID(:RelacionID)';
            $stm = $this->pdo->prepare($sql);
            $stm->bindParam(':RelacionID', $RelacionID, PDO::PARAM_INT);
            $stm->execute();
            return $stm->fetch(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Eliminar($RelacionID)
    {
        try
        {
            $sql = "CALL DELETE_ASIGNACION($RelacionID)";
            $stm = $this->pdo->prepare($sql);
            $stm->execute();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Actualizar($data)
    {
        try
        {

            $sql = 'CALL UPDATE_ASIGNACION(?,?,?,?)';

            $this->pdo->prepare($sql)
                ->execute(
                    array(
                        $data->AulaID,
                        $data->AsignaturaID,
                        $data->HorarioID,
                        $data->RelacionID,
                    )
                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Registrar(Asignacion $data)
    {
        try
        {
            $sql = 'CALL INSERT_ASIGNACION(?,?,?)';
            $this->pdo->prepare($sql)
                ->execute(
                    array(
                        $data->AulaID,
                        $data->AsignaturaID,
                        $data->HorarioID
                    )
                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}