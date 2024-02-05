<?php

if (file_exists('model/ChapterModel.php')) {
    require_once("model/ChapterModel.php");
    require_once("model/CommentModel.php");
} else {
    require_once("../model/ChapterModel.php");
    require_once("../model/CommentModel.php");
}



class ChapterController {
    private $chapterModel;
    private $commentModel;

    public function __construct() {
        $this->chapterModel = new ChapterModel();
        $this->commentModel = new CommentModel();
    }

    public function readChapter($chapterId) {
        $comments = $this->commentModel->getComments($chapterId);
        $chapter = $this->chapterModel->getChapter($chapterId);
        return ['chapter' => $chapter, 'comments' => $comments];
    }

    public function getChapters() {
        $chapters = $this->chapterModel->getChapters();
        return ['chapters' => $chapters];
    }

    public function edit()
    {
        if (!($_POST["idchapter"] && $_POST["title"] && $_POST["content"])) {
            header("Location: ./view/edit.php?id=" . $_POST["idchapter"] . "&error=1");
        } else {
            $this->chapterModel->updateChapter(
                $_POST["title"],
                $_POST["content"],
                $_POST["idchapter"]
            );
            header("Location: ./view/read.php?id=" . $_POST["idchapter"]);
        }
    }

    public function create() {
        try {
            if (!($_POST["number"] && $_POST["title"] && $_POST["content"])) {
                header("Location: ./view/create.php?error=1");
            } else {
                $this->chapterModel->createChapter(
                    $_POST["number"],
                    $_POST["title"],
                    $_POST["content"],
                    date("Y/m/d")
                );
                header('Location: ./');
            }
        } catch (Exception $e) {
            header("Location: ./view/create.php?error=2");
        }
    }

    public function delete() {
        $this->chapterModel->deleteChapter($_POST['chapnumber']);
        header('Location: ./');
    }

    public function getAdjacentChapters($chapterId) {
        $previousChapter = $this->chapterModel->getAdjacentChapter($chapterId, 'DESC');
        $nextChapter = $this->chapterModel->getAdjacentChapter($chapterId, '');

        return [
            'previousChapter' => $previousChapter,
            'nextChapter' => $nextChapter,
        ];
    }
}

?>
