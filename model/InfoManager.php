<?php
class InfoManager {
    private $db;

    public function __construct() {
        $this->db = $this->dbConnect();
    }

    public function getAdminTitle(){
        $req = $this->db->query("SELECT value FROM infogener WHERE info ='title'");

        return $req;
    }

    public function getResume(){
        $req = $this->db->query("SELECT value FROM infogener WHERE info = 'resume'");

        return $req;
    }

    public function updatetitle($titleUpdate){
        $req = $this->db->prepare("UPDATE infogener SET value = ? WHERE info = 'title'");
        $req->execute(array(htmlspecialchars($titleUpdate)));

        return $req;
    }

    public function updateResume($resumeUpdate){
        $req = $this->db->prepare("UPDATE infogener SET value = ? WHERE info = 'resume'");
        $req->execute(array(htmlspecialchars($resumeUpdate)));

        return $req;
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
