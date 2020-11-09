<?php
function createchapter($id, $title, $content, $date){
    $db = dbConnect();
    $req = $db->prepare("INSERT INTO chapitres (id, title, content, datepublication) VALUES (?, ?, ?, ?)");
    $req->execute(array($id, $title, $content, $date));

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