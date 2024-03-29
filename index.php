</head>
<body>
<h1 class="text-center"><?= htmlspecialchars($title['value']) ?></h1>
<p class="text-center"><?= htmlspecialchars($resume['value'])?></p>
<div class="text-center">
    <?php
    if (!isset($_SESSION['user_id'])) { ?>
        <a href="./login" class="btn btn-success">Connexion</a>
    <?php }
    else {
        ?>
        <a href="./create" class="btn btn-primary mx-auto">Nouveau chapître</a>
        <a href="./infogener" class="btn btn-primary mx-auto">Page admin</a>
        <a href="./router.php?action=logout" class="btn btn-danger mx-auto">Déconnexion</a>
    <?php }
    ?>
</div>

<br>




<?php
while ($chapter = $chapters->fetch())
{
    ?>
    <div class="container border rounded shadow" style="margin-bottom: 15px; background-color: #f6f6f6; display: flex; flex-direction: column; align-items: stretch;">
        <a href="./read?id=<?= htmlspecialchars($chapter['id']) ?>">
            <div style="height: 80px; overflow: hidden;">
                <strong>Chapitre <?= htmlspecialchars($chapter['id']) ?> <?= htmlspecialchars_decode($chapter['title']) ?>: </strong>
                <div style="white-space: pre-line; word-wrap: break-word;"><?= htmlspecialchars_decode($chapter['content']) ?></div>
            </div>
        </a>
        <form method="post" action="./router.php?action=deleteChapter" style="align-self: flex-end; margin-top: 5px;">
            <input type="text" class="form-control d-none"  name="chapnumber" value="<?=$chapter['id']?>">
            <?php
            if (isset($_SESSION['user_id'])) { ?>
                <button type="submit" class="btn btn-danger">X</button>
            <?php } ?>
        </form>
    </div>
    <?php
}
?>

</body>
</html>