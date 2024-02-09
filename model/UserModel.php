<?php

class UserModel
{

    private $db;

    public function __construct() {
        $this->db = $this->dbConnect();
    }

    public function checkLogin($username, $password)
    {
        $query = "SELECT * FROM user WHERE identifiant=?";
        $req = $this->db->prepare($query);
        $req->execute([$username]);
        $user = $req->fetch();

        if ($user && password_verify($password, $user['mdp'])) {
            return $user;
        }

        return false;
    }

    private function dbConnect() {
        try {
            $bdd = new PDO('mysql:host=localhost;dbname=blogecrivain;charset=utf8', 'root', 'root');
            return $bdd;
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }
}

?>

