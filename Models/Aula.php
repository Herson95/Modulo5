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
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Listar()
	{
		try 
		{
			$result = array();

			//$sql = 'CALL read_aula()';
			//$sql = 'SELECT * FROM tbl_aulas';
			//$stm = $this->pdo->prepare($sql);
			$stm = $this->pdo->prepare("SELECT * FROM tbl_aulas");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Obtener($AulaID)
	{
		try
		{
			//Nueva forma sino funciona borrar y quitar los comentario de las 2 lineas siguientes...
			/*$sql = 'CALL read_aula_id('+$id+')';
			$stm = $this->pdo->prepare($sql);*/

			//otra forma
			//$sql = 'CALL read_aula_id(:id)';
			//$stm = $this->pdo->prepare($sql);
			//$stm->bindParam(':id', $AulaID, PDO::PARAM_INT);
			
			/*otra forma
			$sql = "CALL read_alumno_id($id)";
			$stm = $this->pdo->prepare($sql);
			$stm->execute();*/
			
			//forma sin procedimiento almacaneado
			$stm = $this->pdo->prepare("SELECT * FROM tbl_aulas WHERE AulaID = ?");
			$stm->execute(array($AulaID));
			//$stm->execute();
			
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

 public function Eliminar($AulaID)	
 {
	 try
	 {
		 //$sql = "CALL delete_aula_id($AulaID)";
		 $stm = $this->pdo->prepare("DELETE FROM tbl_aulas WHERE AulaID = ?");
		 //$stm = $this->pdo->prepare($sql);
		 $stm->execute(array($AulaID));
	 }
	 catch (Exception $e)
		{
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
				$data->AulaID
			)
		);
	}catch (Exection $e)
	{
		die($e->getMessage());
	}
 }

 public function Registrarse(Aula $data)
 {
	 try
	 {
		 //$sql = 'CALL insert_aula(?,?,?)';
		 $sql = "INSERT INTO tbl_aulas (Aula, Capacidad) VALUE (?,?)";
		 $this->pdo->prepare($sql)
		 ->execute(
			 array(
				 $data->Aula,
				 $data->Capacidad	
			 )
		);
	 }catch (Exception $e)
	 {
		 die($e->getMessage());
	 }
   }
 }

?>