<?php

class UserModel
{

    private $db;

    public function __construct() {
        $this->db = $this->dbConnect();
    }

    public function checkLogin($username, $password)
    {
        $query = "SELECT * FROM user WHERE identifiant='$username' AND mdp='$password'";
        $result = $this->db->query($query);

        return $result->fetch();
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

