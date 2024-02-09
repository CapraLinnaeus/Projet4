<?php
$id = $_GET['id'];
require_once("../router.php");
$chapterInfo = read($id);
$previousChapter = $chapterInfo['adjascentChapters']['previousChapter'];
$nextChapter = $chapterInfo['adjascentChapters']['nextChapter'];
$chapter = $chapterInfo['infos']['chapter'];
$comments = $chapterInfo['infos']['comments'];
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include_once("../head.php");
?>

<body>


<a href="../index.php"><img style="max-width: 50px" src="../img/109618.png" alt="arrow"></a>
<?php
if (isset($_SESSION['user_id'])) { ?>
    <a href="edit.php?id=<?= $chapter['id'] ?>" class="btn btn-info" style="margin-left: 30px;">Editer</a>
<?php }
?>
<div class="container border rounded shadow" style="padding-bottom: 15px;">
    <h1 class="text-center" style="font-family: Georgia, serif; margin-top: 15px;">
        Chapître <?= htmlspecialchars($chapter['id']) ?>
        : <?= htmlspecialchars_decode($chapter['title']) ?></h1>

    <p class="text-justify"
        style="margin-left: 30px; margin-right: 30px; word-wrap: break-word; -ms-word-wrap: break-word;">
        <br><?= htmlspecialchars_decode($chapter['content']) ?>
    </p>
    <?php if (isset($previousChapter['id'])) { ?>
        <a href="read.php?id=<?= $previousChapter['id'] ?>">
            <button type="button" class="btn btn-info" style="margin-left: 30px;">Chapître précédent</button>
        </a>
    <?php } ?>
    <?php if (isset($nextChapter['id'])) { ?>
        <a href="read.php?id=<?= $nextChapter['id'] ?>">
            <button type="button" class="btn btn-info" style="margin-left: 60%; margin-right: 10px;">Chapître suivant
            </button>
        </a>
    <?php } ?>
</div>

<br>
<div class="container border rounded shadow">
    <form method="post" action="../router.php?action=addComment">
        <div class="form-group">
            <label for="exampleInputEmail1">Pseudo</label>
            <input type="text" class="form-control" id="exampleInputTitle1" aria-describedby="pseudo" name="username"
                   placeholder="Pseudo">
            <label for="exampleFormControlTextarea1">Commentaire</label>
            <textarea class="form-control" id="addComment" name="content" rows="3"
                      placeholder="Ecrivez votre commentaire ici"></textarea>
            <input type="text" class="form-control d-none" name="idchapter" value="<?= $chapter['id'] ?>">
            <button type="submit" class="btn btn-info" style="margin-left: 30px;margin-top: 10px;">Poster</button>
        </div>
    </form>
    <?php
    if (isset($_GET['error']) && (int)$_GET['error'] == 1) { ?>
        <span style="color: red"> Vérifiez les champs !</span>
    <?php }
    ?>
</div>
<br>
<?php
while ($comment = $comments->fetch()) {

    ?>

    <div class="container border rounded shadow" style="margin-bottom: 10px; padding-bottom: 51px;">
        <strong><?= $comment['name'] ?></strong>
        le <?= htmlspecialchars($comment['datepublication']) ?> <?= htmlspecialchars_decode($comment['content']) ?>
        <form method="post" action="../router.php?action=reportComment">
            <input type="text" class="form-control d-none" name="idcomment" value="<?= $comment['id'] ?>">
            <input type="text" class="form-control d-none" name="idchapter" value="<?= $chapter['id'] ?>">
            <input type="text" class="form-control d-none" name="reportvalue" value="<?= $comment['report'] + 1 ?>">
            <div style="position: relative; float: right">
                <button type="submit" class="btn btn-outline-danger">Signaler</button>
            </div>
        </form>
        <form method="post" action="../router.php?action=deleteComment">
            <input type="text" class="form-control d-none" name="idcomment" value="<?= $comment['id'] ?>">
            <input type="text" class="form-control d-none" name="idchapter" value="<?= $chapter['id'] ?>">
            <?php
            if (isset($_SESSION['user_id'])) { ?>
                <div style="position: relative; float: right; margin-right: 5px">
                    <button type="submit" class="btn btn-outline-danger">X</button>
                </div>
            <?php }
            ?>
        </form>
    </div>
    <?php
}
?>
</body>
</html>

<script>
    tinymce.init({
        selector: '#addComment'
    });
</script>