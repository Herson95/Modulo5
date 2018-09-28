<?php
//Este modelo lo realizara Adonis
require_once "Config/Database.php";
class Profesor
{
    private $pdo;

    public $ProfesorID;
    public $Nombre;
    public $Apellido;
    public $Dui;
    public $Telefono;
    public $Estado;

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

            $stm = $this->pdo->prepare("SELECT * FROM tbl_profesores");
            $stm->execute();

            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Obtener($id)
    {
        try
        {
            $stm = $this->pdo
                ->prepare("SELECT * FROM tbl_profesores WHERE ProfesorID = ?");

            $stm->execute(array($id));
            return $stm->fetch(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Eliminar($id)
    {
        try
        {
            $stm = $this->pdo
                ->prepare("DELETE FROM tbl_profesores WHERE ProfesorID = ?");

            $stm->execute(array($id));
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Actualizar($data)
    {
        try
        {
            $sql = "UPDATE tbl_profesores SET
						Nombre        = ?,
						Apellido      = ?,
                        Dui           = ?,
						Telefono      = ?,
						Estado        = ?
				    WHERE ProfesorID = ?";

            $this->pdo->prepare($sql)
                ->execute(
                    array(
                        $data->Nombre,
                        $data->Apellido,
                        $data->Dui,
                        $data->Telefono,
                        $data->Estado,
                        $data->ProfesorID,
                    )
                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Registrar(Profesor $data)
    {
        try
        {
            $sql = "INSERT INTO tbl_profesores (Nombre,Apellido,Dui,Telefono,Estado)
		        VALUES (?, ?, ?, ?, ?)";

            $this->pdo->prepare($sql)
                ->execute(
                    array(
                        $data->Nombre,
                        $data->Apellido,
                        $data->Dui,
                        $data->Telefono,
                        $data->Estado,

                    )
                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}