<?php
function getAdminTitle(){
    $db = dbConnect();
    $req = $db->query("SELECT value FROM infogener WHERE info ='title'");

    return $req;
}

function getResume(){
    $db = dbConnect();
    $req = $db->query("SELECT value FROM infogener WHERE info = 'resume'");

    return $req;
}

function updatetitle($titleUpdate){
    $db = dbConnect();
    $req = $db->prepare("UPDATE infogener SET value = ? WHERE info = 'title'");
    $req->execute(array($titleUpdate));

    return $req;
}

function updateResume($resumeUpdate){
    $db = dbConnect();
    $req = $db->prepare("UPDATE infogener SET value = ? WHERE info = 'resume'");
    $req->execute(array($resumeUpdate));

    return $req;
}

function getReportedComment(){
    $db = dbConnect();
    $req = $db->query("SELECT * FROM comment WHERE report > 0 ORDER BY report DESC");

    return $req;
}

function getRecentComment(){
    $db = dbConnect();
    $req = $db->query("SELECT * FROM comment ORDER BY datepublication DESC LIMIT 10");

    return $req;
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