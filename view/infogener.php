<body>
<a href="./"><img style="max-width: 50px" src="./img/109618.png" alt="arrow"></a>
<h1 class="text-center">Informations générales</h1>
<br>

<div class="container">

    <form method="post" action="./router.php?action=updateInfos"
          class="container border rounded shadow">
        <div class="form-group">
            <label for="exampleInputTitle1">Titre</label>
            <input type="text" class="form-control" id="exampleInputTitle1" name="title"
                   value="<?= htmlspecialchars($title['value']) ?>"
                   placeholder="Titre du chapître">
        </div>
        <label for="exampleFormControlTextarea1">Résumé</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" name="resume"
                  rows="3"><?= htmlspecialchars($resume['value']) ?></textarea>
        <br>
        <button type="submit" class="btn btn-outline-success" style="margin-bottom: 10px;">Valider</button>
        <?php
        if (isset($_GET['error']) && (int)$_GET['error'] == 1) { ?>
            <span style="color: red"> Vérifiez les champs !</span>
        <?php }
        ?>
    </form>


    <br>
    <h2>Commentaires</h2>
    <div class="container border rounded shadow">
        <br>
        <?php while ($recentComment = $recentComments->fetch()) { ?>
            <div class="container border" style="border: 1px solid silver; background-color: #f6f6f6">
                <strong><?= htmlspecialchars($recentComment['name']) ?></strong>
                le <?= htmlspecialchars($recentComment['datepublication']) ?> <?=htmlspecialchars_decode($recentComment['content'])?>
            </div>
            <br>
        <?php } ?>
        <h3>Commentaires signalés</h3>
        <?php while ($reportedComment = $reportedComments->fetch()) { ?>
            <div class="container border" style="border: 1px solid silver; margin-top: 20px; margin-bottom: 55px; background-color: #f6f6f6">
                <strong><?= htmlspecialchars($reportedComment['name']) ?></strong>
                le <?= htmlspecialchars($reportedComment['datepublication']) ?> <?=htmlspecialchars_decode($reportedComment['content'])?>
                <form method="post" action="./router.php?action=deleteCommentAdmin">
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

    <br>
    <br>
</div>

</body>
</html>