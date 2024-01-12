<?php

require_once("controllers/InfoController.php");
require_once("controllers/ChapterController.php");

$chapterController = new ChapterController();
$infoController = new InfoController();
$chapters = $chapterController->getChapters()['chapters'];
$infos = $infoController->getInfo();
$title = $infos['title'];
$resume = $infos['resume'];


if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include_once("head.php")
?>



<body>
<h1 class="text-center"><?= htmlspecialchars($title['value']) ?></h1>
<p class="text-center"><?= htmlspecialchars($resume['value'])?></p>
<center>
    <?php
    if (!isset($_SESSION['user_id'])) { ?>
        <a href="view/login.php"><button type="button" class="btn btn-success">Connexion</button></a>
    <?php }
    else {
    ?>
    <a href="view/create.php"><button type="button" class="btn btn-primary">Nouveau chapître</button></a>
    <a href="view/infogener.php"><button type="button" class="btn btn-primary">Page admin</button></a>
    <a href="controllers/UserController.php?action=logout"><button type="button" class="btn btn-danger">Déconnexion</button></a>
    <?php }
    ?>
</center>
<br>




<?php
while ($chapter = $chapters->fetch())
{
    ?>
    <a href="view/read.php?id=<?= htmlspecialchars($chapter['id']) ?>">
        <div class="container border rounded shadow" style="margin-bottom: 15px; background-color: #f6f6f6; display: flex; flex-direction: column; align-items: stretch;">
            <div style="height: 80px; overflow: hidden;">
                <strong>Chapitre <?= htmlspecialchars($chapter['id']) ?> <?= htmlspecialchars($chapter['title']) ?>: </strong>
                <div style="white-space: pre-line; word-wrap: break-word;"><?= html_entity_decode($chapter['content']) ?></div>
            </div>
            <form method="post" action="controllers/ChapterController.php?action=delete" style="align-self: flex-end; margin-top: 5px;">
                <input type="text" class="form-control d-none"  name="chapnumber" value="<?=$chapter['id']?>">
                <?php
                if (isset($_SESSION['user_id'])) { ?>
                    <button type="submit" class="btn btn-danger">X</button>
                <?php } ?>


            </form>
        </div>
    </a>

    <?php
}
?>

</body>
</html>