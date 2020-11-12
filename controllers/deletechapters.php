<?php
require_once ('../model/chapters.php');
deleteChapter($_POST['chapnumber']);
header('Location: ../');
?>