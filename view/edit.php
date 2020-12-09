<?php
$id = $_GET['id'];
require_once ("../controllers/getChapter.php");
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
    <title>Create</title>
</head>
<script>
    tinymce.init({
        selector: '#editContent'
    });
</script>
<body>
<div class="container border rounded shadow" style="margin-top: 15px; margin-bottom: 15px;">
    <form method="post" action="../controllers/editChapter.php">
        <div class="form-group" >
            <label for="exampleInputEmail1">Titre</label>
            <input type="text" class="form-control" id="exampleInputTitle1" value="<?= htmlspecialchars($chapter['title'])?>" aria-describedby="emailHelp" name="title" placeholder="Titre du chapître">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">ID</label>
            <input type="number" class="form-control" id="exampleID" value="<?=$id?>" aria-describedby="id" name="nonq" placeholder="Numéro chapître" disabled>
            <input type="number" class="form-control d-none" id="exampleID" value="<?= htmlspecialchars($chapter['id'])?>" aria-describedby="id" name="idchapter" placeholder="Numéro chapître">
        </div>
        <label for="exampleFormControlTextarea1">Contenu</label>
        <textarea class="form-control" id="editContent" name="content" rows="3"><?= htmlspecialchars($chapter['content'])?></textarea>
        <br>
        <button type="button" class="btn btn-primary">Annuler</button>
        <button type="submit" class="btn btn-primary">Valider</button>

    </form>
</div>
</body>
</html>