<?php
require_once ("../controllers/editinfogener.php");
require_once("../controllers/getPageAdminComments.php");

$title = $title->fetch();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <title>InterfaceAdministrateur</title>
</head>

<body>
<center><h1>Informations générales</h1></center>
<br>

<div class="container">

    <form method="post" action="../controllers/updateinfogener.php" class="container border rounded shadow">
        <div class="form-group">
            <label for="exampleInputEmail1">Titre</label>
            <input type="text" class="form-control" id="exampleInputTitle1" name="title" value="<?= htmlspecialchars($title['value']) ?>" aria-describedby="emailHelp" placeholder="Titre du chapître">
        </div>
        <label for="exampleFormControlTextarea1">Résumé</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" name="resume" rows="3"><?= htmlspecialchars($resume->fetch()['value'])?></textarea>
    <br>
        <button type="submit" class="btn btn-outline-success" style="margin-bottom: 10px;">Valider</button>
    </form>

    <form>
<br>
            <h2>Commentaires</h2>
<div class="container border rounded shadow">
    <br/>
    <?php
    while ($recentComment = $recentComments->fetch())
    {
    ?>
        <div class="container border" style="border: 1px solid silver;height:60px; background-color: #f6f6f6">
            <strong><?= htmlspecialchars($recentComment['name'])?></strong> le <?=htmlspecialchars($recentComment['datepublication'])?> <?=$recentComment['content']?></div>
<br>
    <?php
    }
    ?>
        <h3>Commentaires signalés</h3>
        <?php
        while ($reportedComment = $reportedComments->fetch())
        {
        ?>
        <div class="container border" style="border: 1px solid silver;height:60px; background-color: #f6f6f6">
            <strong><?= htmlspecialchars($reportedComment['name'])?></strong> le <?=htmlspecialchars($reportedComment['datepublication'])?> <?=$reportedComment['content']?><button type="button" class="btn btn-outline-danger" style="position: relative; float: right">Supprimer</button>
        </div><br/>
    <?php
        }
    ?>
    <br>
</div>

</body>
</html>