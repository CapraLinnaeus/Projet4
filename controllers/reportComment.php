<?php
require_once("../model/chapters.php");
reportComment($_POST["reportvalue"],$_POST["idcomment"]);
header("Location: ../view/read.php?id=" . $_POST['idchapter']);
?>