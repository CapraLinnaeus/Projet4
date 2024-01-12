<?php
$id = $_GET['id'];
require_once("../controllers/ChapterController.php");

$chapterController = new ChapterController();
$chapter = $chapterController->readChapter($id)['chapter'];
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['user_id'])) {
    header('Location: ../index.php');
    exit();
}
include_once("../head.php")
?>


<script>
    tinymce.init({
        selector: '#editContent'
    });
</script>
<a href="read.php?id=<?=$chapter['id']?>"><img style="max-width: 50px" src="../img/109618.png"></a>
<body>
<div class="container border rounded shadow" style="margin-top: 15px; padding-bottom: 15px; margin-bottom: 15px;">
    <form method="post" action="../controllers/ChapterController.php?action=edit">
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
        <a href="read.php?id=<?=$chapter['id']?><button type="button" class="btn btn-primary">Annuler</button></a>
        <button type="submit" class="btn btn-primary">Valider</button>

    </form>
</div>
</body>
</html>