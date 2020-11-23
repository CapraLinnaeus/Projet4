<?php
$id = $_GET['id'];
require_once ("../controllers/getChapter.php");
?>

<!DOCTYPE html>
<html lang="en">x
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="style/main.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <title>Read</title>
</head>
<body>
<button type="submit" class="btn btn-primary">Editer</button>
<button type="submit" class="btn btn-danger">X</button>

<div class="container border rounded shadow">
<center><h1  style="font-family:  Georgia, serif; margin-top: 15px;">Chapître <?=htmlspecialchars($chapter['id'])?>: <?= htmlspecialchars($chapter['title'])?></h1></center>

<p class="text-justify" style="margin-left: 30px; margin-right: 30px;"> <br/><?= htmlspecialchars($chapter['content'])?></p>

    <button type="button" class="btn btn-info" style="margin-left: 30px;">Chapître précédent</button>  <button type="button" class="btn btn-info" style="margin-left: 60%; margin-right: ">Chapître suivant</button>


</div> <br/>
<?php
while ($comment = $comments->fetch())
{

?>

    <div class="container border rounded shadow" style="height:120px; margin-bottom: 15px;">
        <strong><?= htmlspecialchars($comment['name'])?></strong> le <?=htmlspecialchars($comment['datepublication'])?> <?=htmlspecialchars($comment['content'])?><div style="position: relative; float: right"><button type="button" class="btn btn-outline-danger">Report</button> <button type="button" class="btn btn-outline-danger">X</button></div>
    </div>
<?php
}
?>
</body>
</html>