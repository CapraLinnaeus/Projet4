<?php
$id = $_GET['id'];
require_once ("../controllers/getChapter.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://cdn.tiny.cloud/1/8craav50ap62ww88s2ruzc5q8ubjwsbd3ulu8lb0f5e5u0ly/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="style/main.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <title>Read</title>
</head>
<script>
    tinymce.init({
        selector: '#addComment'
    });
</script>
<body>

<a href="edit.php?id=<?=$chapter['id']?>"><button type="submit" class="btn btn-info" style="margin-left: 30px;">Editer</button></a>
<button type="submit" class="btn btn-danger">X</button>

<div class="container border rounded shadow">
<center><h1  style="font-family:  Georgia, serif; margin-top: 15px;">Chapître <?=htmlspecialchars($chapter['id'])?>: <?= htmlspecialchars($chapter['title'])?></h1></center>

<p class="text-justify" style="margin-left: 30px; margin-right: 30px;"> <br/><?= htmlspecialchars($chapter['content'])?></p>

    <button type="button" class="btn btn-info" style="margin-left: 30px;">Chapître précédent</button>  <button type="button" class="btn btn-info" style="margin-left: 60%; margin-right: ">Chapître suivant</button>


</div> <br/>
<div class="container border rounded shadow">
<form method="post" action="../controllers/addComment.php">
    <div class="form-group" >
        <label for="exampleInputEmail1">Pseudo</label>
        <input type="text" class="form-control" id="exampleInputTitle1" aria-describedby="pseudo" name="username" placeholder="Pseudo">
        <label for="exampleFormControlTextarea1">Commentaire</label>
        <textarea class="form-control" id="addComment" name="content" rows="3" placeholder="Ecrivez votre commentaire ici"></textarea>
        <input type="text" class="form-control d-none"  name="idchapter" value="<?=$chapter['id']?>">
        <button type="submit" class="btn btn-info" style="margin-left: 30px;margin-top: 10px;">Poster</button>
    </div>
</form>
</div>
<br/>
<?php
while ($comment = $comments->fetch())
{

?>

    <div class="container border rounded shadow" style="height:150px; margin-bottom: 15px;">
        <strong><?= htmlspecialchars($comment['name'])?></strong> le <?=htmlspecialchars($comment['datepublication'])?> <?=$comment['content']?>
        <form method="post" action="../controllers/reportComment.php">
            <input type="text" class="form-control d-none"  name="idcomment" value="<?=$comment['id']?>">
            <input type="text" class="form-control d-none"  name="idchapter" value="<?=$chapter['id']?>">
            <input type="text" class="form-control d-none"  name="reportvalue" value="<?=$comment['report'] + 1?>">
            <div style="position: relative; float: right"><button type="submit" class="btn btn-outline-danger">Report</button>
        </form>
            <form method="post" action="../controllers/deleteComment.php">
                <input type="text" class="form-control d-none"  name="idcomment" value="<?=$comment['id']?>">
                <input type="text" class="form-control d-none"  name="idchapter" value="<?=$chapter['id']?>">
                <button type="submit" class="btn btn-outline-danger">X</button></div>
            </form>
    </div>
<?php
}
?>
</body>
</html>