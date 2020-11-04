<?php
function getTitle(){
    $db = dbConnect();
    $req = $db->query("SELECT value FROM infogener WHERE info ='title'");

    return $req;
}

function getResume(){
    $db = dbConnect();
    $req = $db->query("SELECT value FROM infogener WHERE info = 'resume'");

    return $req;
}

function getChapter(){
    $db = dbConnect();
    $req = $db->query("SELECT * FROM chapitres ORDER BY id DESC");

    return $req;
}

function deleteChapter($chapterid){
    $db = dbConnect();
    $req = $db->prepare("DELETE FROM chapitres WHERE id = ?");
    $req->execute(array($chapterid));

    return $req;
}

function deleteComment($comment){
    $db = dbConnect();
    $req = $db->prepare("DELETE FROM comment WHERE idchapitre = ?");
    $req->execute(array($comment));

    return $req;
}

function dbConnect(){
    try
    {
        $bdd = new PDO('mysql:host=localhost;dbname=blogecrivain;charset=utf8', 'root', 'root');
        return $bdd;

    }
    catch (Exception $e)
    {
        die('Erreur : ' . $e->getMessage());
    }
}
?>
