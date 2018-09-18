<?php
//Este modelo lo realizara Samuel
require_once "Config/Database.php";
class Alumno
{
    private $pdo;


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

}
?>