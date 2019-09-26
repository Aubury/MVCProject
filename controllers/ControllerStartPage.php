<?php

echo "Yahoo!!";
class ControllerCutDb
{
    
    private $v, $m;

    public function __construct()
    {
        include_once ROOT . "/views/ViewMainPage/ViewMainPage.php";  
        include_once ROOT . "/models/ModelCutDb.php";
        $this->v = new ViewMainPage();
        $this->m = new ModelVideo();
    }


    public function actionAddVideo()
    {
        $obj =(array)json_decode($_GET['value']);
        $this->m->addVideo($obj);
    }

    public function actionBuildStartPage()
    {
        $this->v->showMainPage();
    }


}