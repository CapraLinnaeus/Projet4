<?php
function getTitle($gettitle){
    $db = dbConnect();
    $req = $db->prepare("SELECT value FROM infogener WHERE key = title");
    $req->execute(array($gettitle));
    $post  = $req->fetch();

    return $post;
}

function getResume($getRes){
    $db = dbConnect();
    $req = $db->prepare("SELECT value FROM infogener WHERE key = resume");
    $req->execute(array($getRes));
    $post  = $req->fetch();

    return $post;
}

function updatetitle($titleUpdate){
    $db = dbConnect();
    $req = $db->prepare("UPDATE infogener SET value = 'nouvtitre' WHERE key = 'title'");
    $req->execute(array($titleUpdate));

    return $req;
}

function updateResume($resumeUpdate){
    $db = dbConnect();
    $req = $db->prepare("UPDATE infogener SET value = 'nouveautitre' WHERE key = 'title'");
    $req->execute(array($resumeUpdate));

    return $req;
}

function getComment($getComm){
    $db = dbConnect();
    $req = $db->prepare("SELECT * FROM comment WHERE report > 0 ORDER BY report DESC");
    $req->execute(array($getComm));
    $post  = $req->fetch();

    return $post;
}

function deleteComment($deleteComment){
    $db = dbConnect();
    $req = $db->prepare("DELETE FROM comment WHERE id = ?");
    $req->execute(array($deleteComment));

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