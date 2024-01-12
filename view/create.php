<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['user_id'])) {
    header('Location: ../index.php');
    exit();
}
include_once("../head.php")
?>

<a href="../index.php"><img style="max-width: 50px" src="../img/109618.png"></a>

<script>
    tinymce.init({
        selector: '#createContent'
    });
</script>
<body>
<div class="container border rounded shadow" style="margin-top: 15px; margin-bottom: 15px;">
    <form method="post" action="../controllers/ChapterController.php?action=create">
        <div class="form-group">
            <label for="exampleInputEmail1">Titre</label>
            <input type="text" class="form-control" id="exampleInputTitle1" aria-describedby="emailHelp" name="title"
                   placeholder="Titre du chapître">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">ID</label>
            <input type="number" class="form-control" id="exampleID" aria-describedby="id" name="number"
                   placeholder="Numéro chapître">
        </div>
        <label for="exampleFormControlTextarea1">Contenu</label>
        <textarea class="form-control" id="createContent" name="content" rows="3"></textarea>
        <br>
        <button type="submit" class="btn btn-primary">Annuler</button>
        <button type="submit" class="btn btn-primary">Valider</button>

    </form>
</div>
</body>
</html>