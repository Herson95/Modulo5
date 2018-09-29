<?php
//Este modelo lo realizara Cristina
require_once "Config/Database.php";
class Horario
{
    private $pdo;

    public $HorarioID;
    public $Dia;
    public $Hora_inicio;
    public $Hora_fin;

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
        try
        {
            $result = array();

            $sql = 'CALL READ_HORARIO()';
            $stm = $this->pdo->prepare($sql);
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Obtener($HorarioID)
    {
        try
        {
            $sql = ' CALL READ_HORARIO_ID(:HorarioID)';
            $stm = $this->pdo->prepare($sql);
            $stm->bindParam(':HorarioID', $HorarioID, PDO::PARAM_INT);
            $stm->execute();
            return $stm->fetch(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Eliminar($HorarioID)
    {
        try
        {
            $sql = "CALL DELETE_HORARIO($HorarioID)";
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

            $sql = 'CALL UPDATE_HORARIO(?,?,?,?)';
            
            $this->pdo->prepare($sql)
                ->execute(
                    array(
                        $data->Dia,
                        $data->Hora_inicio,
                        $data->Hora_fin,
                        $data->HorarioID,
                    )
                );
        } catch (Exection $e) {
            die($e->getMessage());
        }
    }

    public function Registrar(Horario $data)
    {
        try
        {

           $sql = 'CALL INSERT_HORARIO(?,?,?)';
            $this->pdo->prepare($sql)
                ->execute(
                    array(
                        $data->Dia,
                        $data->Hora_inicio,
                        $data->Hora_fin,
                    )
                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}