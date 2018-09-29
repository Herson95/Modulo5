<?php
//Este modelo lo realizara Adonis
require_once "Config/Database.php";
class Profesor{
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
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Listar(){
		try{
			$result = array();

			$sql = 'CALL READ_PROFESOR()';
			$stm = $this->pdo->prepare($sql);
			$stm->execute();
			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e){
			die($e->getMessage());
		}
	}

	public function Obtener($ProfesorID){
		try{
			$sql =' CALL READ_PROFESOR_ID(:ProfesorID)';
			$stm = $this->pdo->prepare($sql);
			$stm->bindParam(':ProfesorID', $ProfesorID, PDO::PARAM_INT);
			$stm->execute();
			return $stm->fetch(PDO::FETCH_OBJ);
		}catch(Exception $e){
			die($e->getMessage());
		}
	}

	public function Eliminar($ProfesorID)
	{
		try 
		{
			$sql = "CALL DELETE_PROFESOR($ProfesorID)";
			$stm = $this->pdo->prepare($sql);
			$stm->execute();
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Actualizar($data)
	{
		try 
		{

			$sql = 'CALL UPDATE_PROFESOR(?,?,?)';

			$this->pdo->prepare($sql)
			     ->execute(
				    array(
						$data->Nombre, 
                        $data->Apellido,
                        $data->Dui,
                        $data->Telefono,
                        $data->Estado,
                        $data->ProfesorID
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Registrar(Profesor $data)
	{
		try 
		{
			$sql = 'CALL INSERT_PROFESOR(?,?)';
			$this->pdo->prepare($sql)
		     ->execute(
				array(
					$data->Nombre, 
					$data->Apellido,
					$data->Dui,
					$data->Telefono,
					$data->Estado,
					$data->ProfesorID
                )
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
}

?>
