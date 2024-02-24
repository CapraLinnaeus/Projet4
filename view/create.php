<script>
    tinymce.init({
        selector: '#createContent'
    });
</script>

</head>
<body>
<a href="./"><img style="max-width: 50px" src="./img/109618.png" alt="arrow"></a>
<div class="container border rounded shadow" style="margin-top: 15px; margin-bottom: 15px;">
    <form method="post" action="./router.php?action=createChapter">
        <div class="form-group">
            <label for="exampleInputTitle1">Titre</label>
            <input type="text" class="form-control" id="exampleInputTitle1"  name="title"
                   placeholder="Titre du chapître">
        </div>
        <div class="form-group">
            <label for="exampleID">ID</label>
            <input type="number" class="form-control" id="exampleID"  name="number"
                   placeholder="Numéro chapître">
        </div>
        <label for="createContent">Contenu</label>
        <textarea class="form-control" id="createContent" name="content" rows="3"></textarea>
        <br>
        <button type="submit" class="btn btn-primary">Annuler</button>
        <button type="submit" class="btn btn-primary">Valider</button>
        <?php
        if (isset($_GET['error']) && (int)$_GET['error'] == 1) { ?>
            <span style="color: red"> Vérifiez les champs !</span>
        <?php }
        ?>
        <?php
        if (isset($_GET['error']) && (int)$_GET['error'] == 2) { ?>
            <span style="color: red"> Le chapitre existe déja!</span>
        <?php }
        ?>
    </form>
</div>
</body>
</html>