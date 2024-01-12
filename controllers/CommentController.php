<?php
require_once("../model/CommentModel.php");

class CommentController {
    private $commentModel;

    public function __construct() {
        $this->commentModel = new CommentModel();
    }

    public function getAdminComments() {
        $reportedComments = $this->commentModel->getReportedComment();
        $recentComments = $this->commentModel->getRecentComment();
        return ['reportedComments' => $reportedComments, 'recentComments' => $recentComments];
    }


    public function addComment()
    {
        if (!(isset($_POST["username"]) && ($_POST["content"]))) {
            header("Location: ../view/read.php?id=" . $_POST["idchapter"] . "&error=1");
        } else {
            $this->commentModel->addComment($_POST["username"], $_POST["content"], date("Y/m/d"), $_POST["idchapter"]);
            header("Location: ../view/read.php?id=" . $_POST["idchapter"]);
        }
    }

    public function reportComment()
    {
        $this->commentModel->reportComment($_POST["reportvalue"],$_POST["idcomment"]);
        header("Location: ../view/read.php?id=" . $_POST["idchapter"]);
    }

    public function deleteComment($origin)
    {
        $this->commentModel->deleteComment($_POST['idcomment']);
        if ($origin === 'read') {
            header("Location: ../view/read.php?id=" . $_POST["idchapter"]);
        } else if ($origin === 'admin') {
            header("Location: ../view/infogener.php");
        }
    }
}

if(isset($_GET['action'])) {
    $action = $_GET['action'];
    $commentController = new CommentController();

    switch($action) {
        case 'addComment':
            $commentController->addComment();
            break;
        case 'reportComment':
            $commentController->reportComment();
            break;
        case 'deleteComment':
            $commentController->deleteComment('read');
            break;
        case 'deleteCommentAdmin':
            $commentController->deleteComment('admin');
    }
}
?>

