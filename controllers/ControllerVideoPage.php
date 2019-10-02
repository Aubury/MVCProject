<?php


class ControllerVideoPage
{
    private $v, $m;

    public function __construct()
    {
        include_once ROOT . "/views/ViewVideoPage/ViewVideoPage.php";
        include_once ROOT . "/models/ModelVideoPage.php";
        $this->v = new ViewVideoPage();
        $this->m = new ModelVideoPage();
    }


    public function actionAddVideo()
    {
        $obj =(array)json_decode($_GET['value']);
        $this->m->addVideo($obj);
    }

    public function actionShowVideoPage()
    {
        $this->v->showVideoPage();
    }

    public function actionTotalVideo()
    {
        $this->m->TotalVideo();
    }


}