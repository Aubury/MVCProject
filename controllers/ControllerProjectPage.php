<?php


class ControllerProjectPage
{
    private $v, $m;

    public function __construct()
    {
        include_once ROOT . "/views/ViewProjectPage/ViewProjectPage.php";
        include_once ROOT . "/models/ModelProjectPage.php";
        $this->v = new ViewProjectPage();
        $this->m = new ModelProjectPage();
    }


    public function actionAddProject()
    {
        echo "Новый проект добавлен";
        echo "<br>";

        $obj =(array)json_decode($_GET['value']);
        $this->m->addProject($obj);
    }


    public function actionShowProjects()
    {
        $this->v->showFormProject();
    }
}