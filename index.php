<?php
require_once("controllers/getChapters.php");
require_once ("controllers/getinfogener.php");

try
{
    $bdd = new PDO('mysql:host=localhost;dbname=blogecrivain;charset=utf8', 'root', 'root');
    $reponse = $bdd->query('SELECT * FROM `user` ');
    $donnees = $reponse->fetch();

}
catch (Exception $e)
{
    die('Erreur : ' . $e->getMessage());
}

if (isset($_GET['action'])) {
    if ($_GET['action'] == 'createchapter') {
        createchapter();
    }
    elseif ($_GET['action'] == 'post') {
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            createchapter();
        }
        else {
            echo 'Erreur : aucun identifiant de billet envoyé';
        }
    }
}
$title = $title->fetch();
?>



<!DOCTYPE html>
<html lang="fr">
<head>
    <script src="https://cdn.tiny.cloud/1/8craav50ap62ww88s2ruzc5q8ubjwsbd3ulu8lb0f5e5u0ly/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="style/main.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <title><?= htmlspecialchars($title['value']) ?></title>
</head>
<body>
<h1 class="text-center"><?= htmlspecialchars($title['value']) ?></h1>
<p class="text-center"><?= htmlspecialchars($resume->fetch()['value'])?></p>
<center>
    <a href="view/create.php"><button type="button" class="btn btn-primary">Nouveau chapître</button></a>
    <a href="view/infogener.php"><button type="button" class="btn btn-primary">Page admin</button></a>
    <a href="/index.php"><button type="button" class="btn btn-danger">Déconnexion</button></a>
    <a href="view/login.php"><button type="button" class="btn btn-success">Connexion</button></a>
</center>
<br>

<?php

while ($chapter = $chapters->fetch())
{
    ?>
    <a href="view/read.php?id=<?= htmlspecialchars($chapter['id']) ?>">
<div class="container border rounded shadow" style="height:80px; margin-bottom: 15px; background-color: #f6f6f6; overflow: hidden">
    <strong>Chapitre <?= htmlspecialchars($chapter['id']) ?> <?= htmlspecialchars($chapter['title']) ?>: </strong><?= htmlspecialchars($chapter['content']) ?>
    <form method="post" action="controllers/deletechapters.php">
        <input type="text" class="form-control d-none"  name="chapnumber" value="<?=$chapter['id']?>">
        <button type="submit" class="btn btn-danger">X</button>
    </form>
</div>
    </a>
 <?php
}
?>

</body>
</html>