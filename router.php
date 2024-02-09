<?php
require_once("controllers/ChapterController.php");
require_once("controllers/CommentController.php");
require_once("controllers/InfoController.php");
require_once("controllers/UserController.php");

function read($id) {
    $chapterController = new ChapterController();
    $infos = $chapterController->readChapter($id);
    $adjascentChapters = $chapterController->getAdjacentChapters($id);
    return ['infos' => $infos, 'adjascentChapters' => $adjascentChapters];
}

function getChapters() {
    $chapterController = new ChapterController();
    $infoController = new InfoController();
    $chapters = $chapterController->getChapters()['chapters'];
    $infos = $infoController->getInfo();
    return ['infos' => $infos, 'chapters' => $chapters];
}

function getEdit($id) {
    $chapterController = new ChapterController();
    return $chapterController->readChapter($id)['chapter'];
}

function getInfoGener() {
    $commentController = new CommentController();
    $infoController = new InfoController();
    $reportedComments = $commentController->getAdminComments()['reportedComments'];
    $recentComments = $commentController->getAdminComments()['recentComments'];
    $title = $infoController->getInfo()['title'];
    $resume = $infoController->getInfo()['resume'];

    return ['reportedComments' => $reportedComments, 'recentComments' => $recentComments, 'title' => $title, 'resume' => $resume];
}

if(isset($_GET['action'])) {
    $action = $_GET['action'];
    $chapterController = new ChapterController();
    $commentController = new CommentController();
    $infoController = new InfoController();
    $userController = new UserController();

    switch($action) {
        case 'editChapter':
            $chapterController->edit();
            break;
        case 'createChapter':
            $chapterController->create();
            break;
        case 'deleteChapter':
            $chapterController->delete();
            break;
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
        case 'updateInfos':
            $infoController->updateInfos();
            break;
        case 'login':
            $userController->login();
            break;
        case 'logout':
            $userController->logout();
            break;
    }
}