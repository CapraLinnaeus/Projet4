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
        $this->chapterModel->updateChapter($_POST["title"], $_POST["content"], $_POST["idchapter"]);
        header("Location: ../view/read.php?id=" . $_POST["idchapter"]);
    }

    public function create() {
        $this->chapterModel->createChapter($_POST["number"], $_POST["title"], $_POST["content"], date("Y/m/d"));
        header('Location: ../');
    }

    public function delete() {
        $this->chapterModel->deleteChapter($_POST['chapnumber']);
        header('Location: ../');
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

if(isset($_GET['action'])) {
    $action = $_GET['action'];
    $chapterController = new ChapterController();

    switch($action) {
        case 'edit':
            $chapterController->edit();
            break;
        case 'create':
            $chapterController->create();
            break;
        case 'delete':
            $chapterController->delete();
            break;
    }
}
?>
