<?php

function getChapter($getChapter)
{
    $db = dbConnect();
    $req = $db->prepare("SELECT * FROM chapitres WHERE id = ?");
    $req->execute(array($getChapter));
    $post = $req->fetch();

    return $post;
}

function updateChapter($title, $content, $id)
{
    $db = dbConnect();
    $req = $db->prepare("UPDATE chapitres SET title = ? , content = ?, datemodification =now() WHERE id = ?");
    $req->execute(array($title, $content, $id));

    return $req;
}

function dbConnect()
{
    try {
        $bdd = new PDO('mysql:host=localhost;dbname=blogecrivain;charset=utf8', 'root', 'root');
        return $bdd;

    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
}

?>