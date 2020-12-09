<?php
function getChapter($chapterid){
    $db = dbConnect();
    $req = $db->prepare("SELECT * FROM chapitres WHERE id = ?");
    $req->execute(array($chapterid));
    $post  = $req->fetch();

    return $post;
}

function getComments($chapterid){
    $db = dbConnect();
    $req = $db->prepare("SELECT * FROM comment WHERE idchapitre = ? ORDER BY datepublication DESC");
    $req->execute(array($chapterid));

    return $req;
}

function deleteChapter($chapterid){
    $db = dbConnect();
    $req = $db->prepare("DELETE FROM chapitres WHERE id = ?");
    $req->execute(array($chapterid));

    return $req;
}

function addComment($username,$content,$datepublication,$idchapitre){
    $db = dbConnect();
    $req = $db->prepare("INSERT INTO `comment` (`id`, `name`, `content`, `datepublication`, `report`, `idchapitre`) VALUES (NULL, ?,?, ?, '0', ?)");
    $req->execute(array($username, $content, $datepublication, $idchapitre));

    return $req;
}

function deleteCommentByChapter($chapterid){
    $db = dbConnect();
    $req = $db->prepare("DELETE FROM comment WHERE idchapitre = ?");
    $req->execute(array($chapterid));

    return $req;
}

function deleteComment($id){
    $db = dbConnect();
    $req = $db->prepare("DELETE FROM comment WHERE id = ?");
    $req->execute(array($id));

    return $req;
}

function reportComment($reportValue,$updateComment){
    $db = dbConnect();
    $req = $db->prepare("UPDATE comment SET report = ? WHERE id =?");
    $req->execute(array($reportValue, $updateComment));

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


