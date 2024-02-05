<?php
require_once("controllers/ChapterController.php");
require_once("controllers/CommentController.php");
require_once("controllers/InfoController.php");
require_once("controllers/UserController.php");

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