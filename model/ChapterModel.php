<?php
class ChapterModel {
    private $db;

    public function __construct() {
        $this->db = $this->dbConnect();
    }

    public function createChapter($id, $title, $content, $date){
        $req = $this->db->prepare("INSERT INTO chapitres (id, title, content, datepublication) VALUES (?, ?, ?, ?)");
        $req->execute(array($id, $title, $content, $date));

        return $req;
    }

    public function getChapter($chapterId) {
        $req = $this->db->prepare("SELECT * FROM chapitres WHERE id = ?");
        $req->execute(array($chapterId));
        $chapter = $req->fetch();

        return $chapter;
    }

    public function getChapters(){
        $req = $this->db->query("SELECT * FROM chapitres ORDER BY id DESC");

        return $req;
    }

    public function deleteChapter($chapterId) {
        $req = $this->db->prepare("DELETE FROM chapitres WHERE id = ?");
        $req->execute(array($chapterId));

        return $req;
    }

    public function updateChapter($title, $content, $id)
    {
        $req = $this->db->prepare("UPDATE chapitres SET title = ? , content = ?, datemodification =now() WHERE id = ?");
        $req->execute(array($title, $content, $id));

        return $req;
    }


    public function getAdjacentChapter($chapterId, $order) {
        $sign = '>';
        if ($order != '') {
            $sign = '<';
        }
        $req = $this->db->prepare("
        SELECT * 
        FROM chapitres 
        WHERE id $sign ? 
        ORDER BY id $order 
        LIMIT 1
    ");
        $req->execute(array($chapterId));

        return $req->fetch();
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

