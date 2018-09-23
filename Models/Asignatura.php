<?php
//Este modelo lo realizara Juan Carlos
require_once "Config/Database.php";
class Asignatura
{
	private $pdo;

	public $AsignaturaID;
	public $Asignatura;
	public $UV;
	
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

			$sql = 'CALL READ_ASIGNATURA()';
			$stm = $this->pdo->prepare($sql);
			$stm->execute();
			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e){
			die($e->getMessage());
		}
	}

	public function Obtener($AsignaturaID){
		try{
			$sql =' CALL READ_ASIGNATURA_ID(:AsignaturaID)';
			$stm = $this->pdo->prepare($sql);
			$stm->bindParam(':AsignaturaID', $AsignaturaID, PDO::PARAM_INT);
			$stm->execute();
			return $stm->fetch(PDO::FETCH_OBJ);
		}catch(Exception $e){
			die($e->getMessage());
		}
	}

	public function Eliminar($AsignaturaID)
	{
		try 
		{
			$sql = "CALL DELETE_ASIGNATURA($AsignaturaID)";
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

			$sql = 'CALL UPDATE_ASIGNATURA(?,?,?)';

			$this->pdo->prepare($sql)
			     ->execute(
				    array(
                        $data->Asignatura, 
                        $data->UV,
                        $data->AsignaturaID
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Registrar(Asignatura $data)
	{
		try 
		{
			$sql = 'CALL INSERT_ASIGNATURA(?,?)';
			$this->pdo->prepare($sql)
		     ->execute(
				array(
                    $data->Asignatura,                  
                    $data->UV
                )
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
}

?>