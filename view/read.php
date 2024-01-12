<?php
$id = $_GET['id'];
require_once("../controllers/ChapterController.php");

$chapterController = new ChapterController();
$infos = $chapterController->readChapter($id);
$chapter = $infos['chapter'];
$comments = $infos['comments'];

$adjascentChapters = $chapterController->getAdjacentChapters($id);
$previousChapter = $adjascentChapters['previousChapter'];
$nextChapter = $adjascentChapters['nextChapter'];

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include_once("../head.php");
?>

<script>
    tinymce.init({
        selector: '#addComment'
    });
</script>
<body>


<a href="../index.php"><img style="max-width: 50px" src="../img/109618.png"></a>
<?php
if (isset($_SESSION['user_id'])) { ?>
    <a href="edit.php?id=<?= $chapter['id'] ?>">
        <button type="submit" class="btn btn-info" style="margin-left: 30px;">Editer</button>
    </a>
<?php }
?>
<div class="container border rounded shadow" style="padding-bottom: 15px;">
    <center><h1 style="font-family: Georgia, serif; margin-top: 15px;">Chapître <?= htmlspecialchars($chapter['id']) ?>
            : <?= htmlspecialchars($chapter['title']) ?></h1>
    </center>

    <p class="text-justify"
       style="margin-left: 30px; margin-right: 30px;  word-wrap: break-word; -ms-word-wrap: break-word;">
        <br/><?= html_entity_decode($chapter['content']) ?>
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

<br/>
<div class="container border rounded shadow">
    <form method="post" action="../controllers/CommentController.php?action=addComment">
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
<br/>
<?php
while ($comment = $comments->fetch())
{

?>

    <div class="container border rounded shadow" style="height:150px; margin-bottom: 15px;">
        <strong><?= htmlspecialchars($comment['name'])?></strong> le <?=htmlspecialchars($comment['datepublication'])?> <?=$comment['content']?>
        <form method="post" action="../controllers/CommentController.php?action=reportComment">
            <input type="text" class="form-control d-none"  name="idcomment" value="<?=$comment['id']?>">
            <input type="text" class="form-control d-none"  name="idchapter" value="<?=$chapter['id']?>">
            <input type="text" class="form-control d-none"  name="reportvalue" value="<?=$comment['report'] + 1?>">
            <div style="position: relative; float: right">
            <button type="submit" class="btn btn-outline-danger">Report</button>
        </form>
            <form method="post" action="../controllers/CommentController.php?action=deleteComment">
                <input type="text" class="form-control d-none"  name="idcomment" value="<?=$comment['id']?>">
                <input type="text" class="form-control d-none"  name="idchapter" value="<?=$chapter['id']?>">
                <?php
                if (isset($_SESSION['user_id'])) { ?>
                    <button type="submit" class="btn btn-outline-danger">X</button>
                    </div>
                <?php }
                ?>
            </form>
            </div>
    </div>
<?php
}
?>
</body>
</html>