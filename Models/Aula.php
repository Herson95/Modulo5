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

            $sql = 'CALL READ_AULA1()';
            $stm = $this->pdo->prepare($sql);
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
            $sql = ' CALL READ_AULA_ID(:AulaID)';
            $stm = $this->pdo->prepare($sql);
            $stm->bindParam(':AulaID', $AulaID, PDO::PARAM_INT);
            $stm->execute();
            return $stm->fetch(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Eliminar($AulaID)
    {
        try
        {
            $sql = "CALL DELETE_AULA($AulaID)";
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

            $sql = 'CALL UPDATE_AULA(?,?,?)';
            
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

           $sql = 'CALL INSERT_AULA(?,?)';
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