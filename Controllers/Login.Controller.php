<?php
require_once 'Models/Login.php';
class LoginController
{

    private $model;

    public function __CONSTRUCT()
    {
        $this->model = new Login();
    }

    public function Index()
    {

        require_once 'Views/header.php';
        require_once 'Views/Login/login.php';
        require_once 'Views/footer.php';
    }

    public function VerificarUsers()
    {
        if (isset($_REQUEST['usuario'])) {
            $usuario = $_REQUEST['usuario'];

        } else {
            $usuario = "";
        }
        if (isset($_REQUEST['usuario'])) {
            $passw = $_REQUEST['password'];

        } else {
            $passw = "";
        }

        $result = $this->model->Login($usuario, $passw);

        if ($result[0]->Result > 0) {
            session_start();
            $_SESSION['Usuario'] = $usuario;

            require_once 'Views/Menu/menu.php';
            require_once 'Views/header.php';
            require_once 'Views/footer.php';
        } else {

            $message = "User or password Incorrect";
            require_once 'Views/header.php';
            require_once 'Views/Login/login.php';
            require_once 'Views/footer.php';

        }

    }

    public function Logout()
    {
        session_start();
        unset($_SESSION['Usuario']);
        session_destroy();
        $this->Index();
    }

}