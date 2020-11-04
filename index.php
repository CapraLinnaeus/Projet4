<?php
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
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <title>Billet simple pour l'Alaska</title>
</head>
<body>
<h1 class="text-center">Billet simple pour l'Alaska</h1>
<p class="text-center">Moricio décide de partir à l'aventure en Alaska seul avec son sac à dos. Mais tous ne sera pas comme il l'avait prévu </p>
<center><button type="button" class="btn btn-primary">Nouveau chapître</button>
<button type="button" class="btn btn-primary">Page admin</button>
<button type="button" class="btn btn-danger">Déconnexion</button>
<button type="button" class="btn btn-success">Connexion</button>
</center>
<br>
<div class="container" style="border: 1px solid silver;height:60px;">
    <strong>Chapître 1: Le voyage de Moricio:</strong> Moricio commence son aventure en Alaska après des heures de trajet le voilà arrivé sur toute cette neige. <button type="button" class="btn btn-danger">X</button>
</div>
<div class="container" style="border: 1px solid silver;height:60px;">
    <strong>Chapître 2: La survie de Moricio:</strong> Moricio pris les matériaux et marche des heures sous la neige, une tempête, des animaux, le froid.. <button type="button" class="btn btn-danger">X</button>
</div>
    <div class="container" style="border: 1px solid silver;height:60px;">
    <strong>Chapître 3: L'amnesie de Moricio:</strong> Il se réveilla sans rien comprendre, entouré de choses étranges et spéctaculaires. <button type="button" class="btn btn-danger">X</button>
</div>
<div class="container" style="border: 1px solid silver;height:60px;">
    <strong>Chapître 4: Moricio le départ?:</strong> Après toutes ces péripéties Moricio prit une grande décision qui changera définitivement toute sa vie. <button type="button" class="btn btn-danger">X</button>
</div>
</body>
</html>