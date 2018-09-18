<?php
//Este modelo lo realizara Adonis
require_once "Config/Database.php";
class Profesor
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