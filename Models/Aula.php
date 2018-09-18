<?php
//Este modelo lo realizara Cristina
require_once "Config/Database.php";
class Aula
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