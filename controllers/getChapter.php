<?php
require_once("../model/chapters.php");
$comments = getComments($id);
$chapter = getChapter($id);
header("../view/read.php?id=" . $_GET['id']);
?>

