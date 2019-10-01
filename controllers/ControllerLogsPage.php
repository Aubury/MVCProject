<?php


class ControllerLogsPage
{
   private $v, $m;

    public function __construct()
    {
        include_once ROOT . "/views/ViewLogsPage/ViewLogsPage.php";
        include_once ROOT . "/models/ModelLogsPage.php";
        $this->v = new ViewLogsPage();
        $this->m = new ModelLogsPage();
    }

    public function actionShowLogsPage()
    {
        $this->v->showLogs();
    }
    public function actionShowTotalLogs()
    {
        $this->m->TotalLogs();
    }
}