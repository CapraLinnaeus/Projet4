<?php

if (file_exists('model/UserModel.php')) {
    require_once("model/UserModel.php");
} else {
    require_once("../model/UserModel.php");
}


class UserController {
    private $userModel;

    public function __construct() {
        $this->userModel = new UserModel();
    }

    public function login()
    {
        $login = isset($_POST["login"]) ? $_POST["login"] : "";
        $password = isset($_POST["password"]) ? $_POST["password"] : "";

        $user = $this->userModel->checkLogin($login, $password);

        if ($user) {
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }
            $_SESSION['user_id'] = $user['id'];
            header('Location: ./index.php');
        } else {
            header('Location: ./view/login.php?error=1');
        }
    }

    public function logout() {
        session_start();
        session_destroy();
        header('Location: ./index.php');
    }
}
?>
