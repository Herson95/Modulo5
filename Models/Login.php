<?php
//Este modelo lo realizara Samuel
require_once "Config/Database.php";
class Login
{
    private $pdo;
    public $ope;
    public $salida;

    public function __CONSTRUCT()
    {
        try
        {
            $this->pdo = Database::StartUp();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function ListarRoles()
    {
        try
        {
            $sql = 'CALL READ_ROLES()';
            $stm = $this->pdo->prepare($sql);
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function ValidarUser($user, $pass)
    {
        try
        {
            $ope = 0;
            $sql = "CALL LOGIN(:puser, :ppass,:pope,@presult);";
            $stm = $this->pdo->prepare($sql);
            $stm->bindParam(':puser', $user, PDO::PARAM_STR);
            $stm->bindParam(':ppass', $pass, PDO::PARAM_STR);
            $stm->bindParam(':pope', $ope, PDO::PARAM_INT);

            $stm->execute();

            $sql = "SELECT @presult AS Result";
            $stm = $this->pdo->query($sql);

            return $stm->fetchAll(PDO::FETCH_OBJ);

        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Login($user, $pass)
    {
        $result = $this->ValidarUser($user, $pass);
        $ope = $result[0]->Result;

        $sql = "CALL LOGIN(:puser, :ppass,:pope,@presult);";
        $stm = $this->pdo->prepare($sql);
        $stm->bindParam(':puser', $user, PDO::PARAM_STR);
        $stm->bindParam(':ppass', $pass, PDO::PARAM_STR);
        $stm->bindParam(':pope', $ope, PDO::PARAM_INT);

        $stm->execute();

        $sql = "SELECT @presult AS Result";
        $stm = $this->pdo->query($sql);

        return $stm->fetchAll(PDO::FETCH_OBJ);

    }

}