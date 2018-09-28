<?php
//Este modelo lo realizara Cristina
require_once "Config/Database.php";
class Aula
{
    private $pdo;

    public $AulaID;
    public $Aula;
    public $Capacidad;

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

            $stm = $this->pdo->prepare("SELECT * FROM tbl_aulas");
            $stm->execute();

            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Obtener($AulaID)
    {
        try
        {

            $stm = $this->pdo->prepare("SELECT * FROM tbl_aulas WHERE AulaID = ?");
            $stm->execute(array($AulaID));

            return $stm->fetch(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Eliminar($AulaID)
    {
        try
        {
            $stm = $this->pdo->prepare("DELETE FROM tbl_aulas WHERE AulaID = ?");
            $stm->execute(array($AulaID));
        } catch (Exception $e) {
            die($e->getMessage());
        }

    }

    public function Actualizar($data)
    {

        try
        {
            //$sql = 'CALL update_aula(?,?,?)';
            $sql = "UPDATE tbl_aulas SET Aula = ?, Capacidad =? WHERE AulaID = ?";

            $this->pdo->prepare($sql)
                ->execute(
                    array(
                        $data->Aula,
                        $data->Capacidad,
                        $data->AulaID,
                    )
                );
        } catch (Exection $e) {
            die($e->getMessage());
        }
    }

    public function Registrar(Aula $data)
    {
        try
        {

            $sql = "INSERT INTO tbl_aulas (Aula, Capacidad) VALUE (?,?)";
            $this->pdo->prepare($sql)
                ->execute(
                    array(
                        $data->Aula,
                        $data->Capacidad,
                    )
                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}