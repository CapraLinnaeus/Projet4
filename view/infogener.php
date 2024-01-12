<?php


require_once("../controllers/CommentController.php");
require_once("../controllers/InfoController.php");


$commentController = new CommentController();
$infoController = new InfoController();
$reportedComments = $commentController->getAdminComments()['reportedComments'];
$recentComments = $commentController->getAdminComments()['recentComments'];
$title = $infoController->getInfo()['title'];
$resume = $infoController->getInfo()['resume'];

//$title = $title->fetch();
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['user_id'])) {
    header('Location: ../index.php');
    exit();
}
include_once("../head.php");
?>

<!DOCTYPE html>
<html lang="en">

<a href="../index.php"><img style="max-width: 50px" src="../img/109618.png"></a>
<body>
<center><h1>Informations générales</h1></center>
<br>

<div class="container">

    <form method="post" action="../controllers/InfoController.php?action=updateInfos"
          class="container border rounded shadow">
        <div class="form-group">
            <label for="exampleInputEmail1">Titre</label>
            <input type="text" class="form-control" id="exampleInputTitle1" name="title"
                   value="<?= htmlspecialchars($title['value']) ?>" aria-describedby="emailHelp"
                   placeholder="Titre du chapître">
        </div>
        <label for="exampleFormControlTextarea1">Résumé</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" name="resume"
                  rows="3"><?= htmlspecialchars($resume['value']) ?></textarea>
        <br>
        <button type="submit" class="btn btn-outline-success" style="margin-bottom: 10px;">Valider</button>
    </form>

    <br>
    <h2>Commentaires</h2>
    <div class="container border rounded shadow">
        <br/>
        <?php while ($recentComment = $recentComments->fetch()) { ?>
            <div class="container border" style="border: 1px solid silver; background-color: #f6f6f6">
                <strong><?= htmlspecialchars($recentComment['name']) ?></strong>
                le <?= htmlspecialchars($recentComment['datepublication']) ?> <?= $recentComment['content'] ?>
            </div>
            <br>
        <?php } ?>
        <h3>Commentaires signalés</h3>
        <?php while ($reportedComment = $reportedComments->fetch()) { ?>
            <div class="container border" style="border: 1px solid silver; margin-top: 20px; margin-bottom: 55px; background-color: #f6f6f6">
                <strong><?= htmlspecialchars($reportedComment['name']) ?></strong>
                le <?= htmlspecialchars($reportedComment['datepublication']) ?> <?= $reportedComment['content'] ?>
                <form method="post" action="../controllers/CommentController.php?action=deleteCommentAdmin">
                    <input type="text" class="form-control d-none" name="idcomment" value="<?= $reportedComment['id'] ?>">
                    <?php if (isset($_SESSION['user_id'])) { ?>
                        <button type="submit" class="btn btn-outline-danger" style="position: relative; float: right; margin-top: 5px;">
                            Supprimer
                        </button>
                    <?php } ?>
                </form>
            </div>
        <?php } ?>
    </div>

    <br/>
    <br>
</div>

</body>
</html>