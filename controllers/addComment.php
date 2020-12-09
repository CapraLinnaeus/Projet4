<?php
require_once ('../model/chapters.php');
addComment($_POST["username"],$_POST["content"], date("Y/m/d"), $_POST["idchapter"]);
header("Location: ../view/read.php?id=" . $_POST["idchapter"]);
?>

