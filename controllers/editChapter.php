<?php
require_once("../model/UpdateChapter.php");
updateChapter($_POST["title"], $_POST["content"], $_POST["idchapter"]);
header("Location: ../view/read.php?id=" . $_POST["idchapter"]);
?>