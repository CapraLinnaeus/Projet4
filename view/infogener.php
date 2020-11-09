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
<div class="container" style="border: 1px solid silver;height:300px;">

    <form method="post" action="../controllers/updateinfogener.php">
        <div class="form-group">
            <label for="exampleInputEmail1">Titre</label>
            <input type="text" class="form-control" id="exampleInputTitle1" name="title" aria-describedby="emailHelp" placeholder="Titre du chapître">
        </div>
        <label for="exampleFormControlTextarea1">Contenu</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" name="resume" rows="3"></textarea>
    <br>
        <button type="submit" class="btn btn-success">Valider</button>
    </form>

    <form>
<br>
            <h2>Commentaires récents</h2>

        <div class="container" style="border: 1px solid silver;height:60px;">
            <strong>Pseudo3</strong> Incroyable histoire j'adore! .</div>

        <div class="container" style="border: 1px solid silver;height:60px;">
            <strong>Pseudo3</strong> je veux la suite!!!.</div>

        <div class="container" style="border: 1px solid silver;height:60px;">
            <strong>Pseudo3</strong> Je n'aime pas du tout c'est mauvais c'est nul vous êtes tous nuls.</div>
<br>
        <h2>Commentaires signalés</h2>

        <div class="container" style="border: 1px solid silver;height:60px;">
            <strong>Pseudo3</strong> Je n'aime pas du tout c'est mauvais c'est nul vous êtes tous nuls. <button type="button" class="btn btn-danger">Supprimer</button>
        </div>

</body>
</html>