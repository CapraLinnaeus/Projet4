<?php
require_once ("../model/pageadmin.php");
$reportedComments = getReportedComment();
$recentComments = getRecentComment();
require_once ("../view/infogener.php");
?>
