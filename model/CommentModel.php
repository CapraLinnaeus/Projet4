<?php
class CommentModel {
    private $db;

    public function __construct() {
        $this->db = $this->dbConnect();
    }

    public function addComment($username, $content, $datePublication, $idChapitre) {
        $req = $this->db->prepare("INSERT INTO `comment` (`name`, `content`, `datepublication`, `report`, `idchapitre`) VALUES (?, ?, ?, '0', ?)");
        $req->execute(array(
            htmlspecialchars($username),
            htmlspecialchars($content),
            htmlspecialchars($datePublication),
            htmlspecialchars($idChapitre)
        ));

        return $req;
    }

    public function getComments($chapterId) {
        $req = $this->db->prepare("SELECT * FROM comment WHERE idchapitre = ? ORDER BY datepublication DESC");
        $req->execute(array($chapterId));

        return $req;
    }

    public function deleteComment($commentId) {
        $req = $this->db->prepare("DELETE FROM comment WHERE id = ?");
        $req->execute(array($commentId));

        return $req;
    }

    public function reportComment($reportValue, $updateComment) {
        $req = $this->db->prepare("UPDATE comment SET report = ? WHERE id =?");
        $req->execute(array($reportValue, $updateComment));

        return $req;
    }

    public function getReportedComment(){
        $req = $this->db->query("SELECT * FROM comment WHERE report > 0 ORDER BY report DESC");

        return $req;
    }

    public function getRecentComment(){
        $req = $this->db->query("SELECT * FROM comment ORDER BY datepublication DESC LIMIT 10");

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
