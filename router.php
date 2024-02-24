<?php
require_once("controllers/ChapterController.php");
require_once("controllers/CommentController.php");
require_once("controllers/InfoController.php");
require_once("controllers/UserController.php");

function read($id)
{
    $chapterController = new ChapterController();
    $infos = $chapterController->readChapter($id);
    $adjascentChapters = $chapterController->getAdjacentChapters($id);
    return ['infos' => $infos, 'adjascentChapters' => $adjascentChapters];
}

function getChapters()
{
    $chapterController = new ChapterController();
    $infoController = new InfoController();
    $chapters = $chapterController->getChapters()['chapters'];
    $infos = $infoController->getInfo();
    return ['infos' => $infos, 'chapters' => $chapters];
}

function getEdit($id)
{
    $chapterController = new ChapterController();
    return $chapterController->readChapter($id)['chapter'];
}

function getInfoGener()
{
    $commentController = new CommentController();
    $infoController = new InfoController();
    $reportedComments = $commentController->getAdminComments()['reportedComments'];
    $recentComments = $commentController->getAdminComments()['recentComments'];
    $title = $infoController->getInfo()['title'];
    $resume = $infoController->getInfo()['resume'];

    return ['reportedComments' => $reportedComments, 'recentComments' => $recentComments, 'title' => $title, 'resume' => $resume];
}

// Fonction pour vérifier l'authentification de l'utilisateur
function checkAuthentication() {
    if (!isset($_SESSION['user_id'])) {
        header('Location: ./');
        exit();
    }
}

// Fonction pour démarrer la session si nécessaire
function startSessionIfNeeded() {
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
}

if (isset($_GET['action'])) {
    $action = $_GET['action'];
    $chapterController = new ChapterController();
    $commentController = new CommentController();
    $infoController = new InfoController();
    $userController = new UserController();

    switch ($action) {
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
            break;
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
} else {
    if (isset($_SERVER['REQUEST_URI'])) {
        $url = $_SERVER['REQUEST_URI'];
        if (strpos($url, '/Projet4v2/read') !== false) {
            if (isset($_GET['id'])) {
                $id = $_GET['id'];

                $chapterInfo = read($id);

                $previousChapter = $chapterInfo['adjascentChapters']['previousChapter'];
                $nextChapter = $chapterInfo['adjascentChapters']['nextChapter'];

                $chapter = $chapterInfo['infos']['chapter'];
                $comments = $chapterInfo['infos']['comments'];

                startSessionIfNeeded();
                include_once("./head.php");
                include("./view/read.php");
            }
        } else if (strpos($url, '/Projet4v2/create') !== false) {
            startSessionIfNeeded();
            checkAuthentication();
            include_once("./head.php");
            include_once("./view/create.php");
        } else if (strpos($url, '/Projet4v2/login') !== false) {
            startSessionIfNeeded();
            include_once("./view/login.php");
        } else if (strpos($url, '/Projet4v2/edit') !== false) {
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $chapter = getEdit($id);
                startSessionIfNeeded();
                checkAuthentication();
                include_once("./head.php");
                include("./view/edit.php");
            }
        }  else if (strpos($url, '/Projet4v2/infogener') !== false) {
            $infoGener = getInfoGener();
            $reportedComments = $infoGener['reportedComments'];
            $recentComments = $infoGener['recentComments'];
            $title = $infoGener['title'];
            $resume = $infoGener['resume'];

            startSessionIfNeeded();
            checkAuthentication();
            include_once("./head.php");
            include("./view/infogener.php");
        } else if ($url === '/Projet4v2/'){
            $chaptersInfo = getChapters();
            $chapters = $chaptersInfo['chapters'];
            $title = $chaptersInfo['infos']['title'];
            $resume = $chaptersInfo['infos']['resume'];
            startSessionIfNeeded();
            include_once("./head.php");
            include("./index.php");
        } else {
            include_once("./head.php");
            header('Location: ./');
        }
    }
}