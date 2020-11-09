<?php
require_once ('../model/pageadmin.php');
updatetitle($_POST["title"]);
updateResume($_POST["resume"]);
header('Location: ../');
?>

