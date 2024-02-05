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




<body>
<a href="read.php?id=<?=$chapter['id']?>"><img style="max-width: 50px" src="../img/109618.png" alt="arrow"></a>
<div class="container border rounded shadow" style="margin-top: 15px; padding-bottom: 15px; margin-bottom: 15px;">
    <form method="post" action="../router.php?action=editChapter">
        <div class="form-group" >
            <label for="exampleInputTitle1">Titre</label>
            <input type="text" class="form-control" id="exampleInputTitle1" value="<?= htmlspecialchars_decode($chapter['title'])?>" aria-describedby="emailHelp" name="title" placeholder="Titre du chapître">
        </div>
        <div class="form-group">
            <label for="exampleID">ID</label>
            <input type="number" class="form-control" disabled id="exampleID" value="<?= htmlspecialchars($chapter['id'])?>"  name="idchapter" placeholder="Numéro chapître">
        </div>
        <label for="editContent">Contenu</label>
        <textarea class="form-control" id="editContent" name="content" rows="3"><?= htmlspecialchars_decode($chapter['content']) ?></textarea>
        <br>
        <a href="read.php?id=<?=$chapter['id']?>" class="btn btn-primary">Annuler</a>
        <button type="submit" class="btn btn-primary">Valider</button>
        <?php
        if (isset($_GET['error']) && (int)$_GET['error'] == 1) { ?>
            <span style="color: red"> Vérifiez les champs !</span>
        <?php }
        ?>
    </form>
</div>
</body>
</html>

<script>
    tinymce.init({
        selector: '#editContent'
    });
</script>