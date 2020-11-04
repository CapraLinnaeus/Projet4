<?php
function deleteComment($deleteComment)
{
    $db = dbConnect();
    $db->exec('INSERT INTO chapitre (id, titre, contenu, publication,) VALUES(X, new titre, new contenu, new())');

    echo 'Modifications effectuées';
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