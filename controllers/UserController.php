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
        $user = $this->userModel->checkLogin($_POST["login"], $_POST["password"]);

        if ($user) {
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }
            $_SESSION['user_id'] = $user['id'];
            header('Location: ../index.php');
        } else {
            header('Location: ../view/login.php?error=1');
        }
    }

    public function logout() {
        session_start();
        session_destroy();
        header('Location: ../index.php');
    }
}

if(isset($_GET['action'])) {
    $action = $_GET['action'];
    $userController = new UserController();

    switch($action) {
        case 'login':
            $userController->login();
            break;
        case 'logout':
            $userController->logout();
            break;
    }
}
?>
