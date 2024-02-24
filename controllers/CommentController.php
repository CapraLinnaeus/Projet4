<?php

if (file_exists('model/CommentModel.php')) {
    require_once("model/CommentModel.php");
    require_once("model/CommentModel.php");
} else {
    require_once("../model/CommentModel.php");
    require_once("../model/CommentModel.php");
}
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
        if (!($_POST["username"] && $_POST["content"])) {
            header("Location: ./read?id=" . $_POST["idchapter"] . "&error=1");
        } else {
            $this->commentModel->addComment(
                $_POST["username"],
                $_POST["content"],
                date("Y/m/d"),
                $_POST["idchapter"]
            );
            header("Location: ./read?id=" . $_POST["idchapter"]);
        }
    }

    public function reportComment()
    {
        $this->commentModel->reportComment($_POST["reportvalue"],$_POST["idcomment"]);
        header("Location: ./read?id=" . $_POST["idchapter"]);
    }

    public function deleteComment($origin)
    {
        $this->commentModel->deleteComment($_POST['idcomment']);
        if ($origin === 'read') {
            header("Location: ./read.php?id=" . $_POST["idchapter"]);
        } else if ($origin === 'admin') {
            header("Location: ./infogener");
        }
    }
}
?>

