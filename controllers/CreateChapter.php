<?php
require_once ('../model/CreateChapter.php');
createchapter($_POST["number"], $_POST["title"], $_POST["content"], date("Y/m/d"));
header('Location: ../');
?>