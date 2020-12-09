<?php
require_once ('../model/chapters.php');
deleteComment($_POST['idcomment']);
header("Location: ../view/read.php?id=" . $_POST['idchapter']);
?>