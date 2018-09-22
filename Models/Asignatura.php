<?php
//Este modelo lo realizara Juan Carlos
require_once "Config/Database.php";
class Asignatura
{
	private $pdo;
	public $id;
	public $Asignatura;
	
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