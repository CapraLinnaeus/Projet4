<?php


if (file_exists('model/InfoManager.php')) {
    require_once("model/InfoManager.php");
} else {
    require_once("../model/InfoManager.php");
}


class InfoController {
    private $infoManager;
    public function __construct() {
        $this->infoManager = new InfoManager();
    }

    public function getInfo() {
        $title = $this->infoManager->getAdminTitle();
        $resume = $this->infoManager->getResume();
        return ['title' => $title->fetch(), 'resume' => $resume->fetch()];

    }

    public function updateInfos() {
        if (!($_POST["title"] && $_POST["resume"])) {
            header("Location: ./infogener?error=1");
        } else {
            $this->infoManager->updatetitle($_POST["title"]);
            $this->infoManager->updateResume($_POST["resume"]);

            header('Location: ./');
        }
    }
}

?>
