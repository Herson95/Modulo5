<?php
//Este modelo lo realizara Samuel
require_once "Config/Database.php";
class Alumno
{
	private $pdo;
	
	public $id;
	public $Nombre;
	public $Apellido;
	public $Genero;
	public $FechaNacimiento;
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

    public function Listar()
	{
		try
		{
			$result = array();

            //$sql = 'CALL read_alumno()';}
            $sql = "SELECT * FROM tbl_alumnos";
			$stm = $this->pdo->prepare($sql);
			
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
    }

    public function Obtener($id)
	{
		try 
		{
			//Nueva forma sino funciona borrar y quitar los comentario de las 2 lineas siguientes...
			/*$sql = 'CALL read_alumno_id('+$id+')';
			$stm = $this->pdo->prepare($sql);*/

			//otra forma
			/*$sql = 'CALL read_alumno_id(:id)';
			$stm = $this->pdo->prepare($sql);
			$stm->bindParam(':id', $id, PDO::PARAM_INT);
			$stm->execute();*/

			/*otra forma
			$sql = "CALL read_alumno_id($id)";
			$stm = $this->pdo->prepare($sql);
			$stm->execute();*/

            //forma sin procedimiento almacaneado
            $sql = "SELECT * FROM tbl_alumnos WHERE AlumnoID = ?";
			$stm = $this->pdo->prepare($sql);
			$stm->execute(array($id));

			return $stm->fetch(PDO::FETCH_OBJ);

		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

    
    public function Registrar(Alumno $data)
	{
		try 
		{
		$sql = "INSERT INTO tbl_alumnos (Nombre,Apellido,Genero,FechaNacimiento,Telefono,FechaRegistro,Estado) 
		        VALUES (?, ?, ?, ?, ?, ?, ?)";

		//$sql = 'CALL insert_alumno(?,?,?,?,?,?)';
		$this->pdo->prepare($sql)
		     ->execute(
				array(
                    $data->Nombre,                  
                    $data->Apellido, 
					$data->Genero, 
                    $data->FechaNacimiento,
                    $data->Telefono,
                    date('Y-m-d'),
                    $data->Estado
                )
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
    }
    
    public function Actualizar (Alumno $data)
	{
		try 
		{
		$sql = "UPDATE  tbl_alumnos SET Nombre=?,Apellido=?,Genero=?,FechaNacimiento=?,Telefono=?,Estado=? WHERE AlumnoID=?";

		//$sql = 'CALL insert_alumno(?,?,?,?,?,?)';
		$this->pdo->prepare($sql)
		     ->execute(
				array(
                    $data->Nombre,                  
                    $data->Apellido, 
					$data->Genero, 
                    $data->FechaNacimiento,
                    $data->Telefono,
                    $data->Estado,
                    $data->id

                )
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
	

}
?>