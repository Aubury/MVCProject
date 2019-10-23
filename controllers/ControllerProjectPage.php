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

        $this->m->addProject($_POST);
//        var_dump($_POST);
    }


    public function actionShowProjects()
    {
        $this->v->showFormProject();
    }
<<<<<<< HEAD
    public function actionGetInfoProject()
    {
        $this->m->getInformationProjects();
    }
    public function actionUserProjectMoney()
    {
        $id = $_COOKIE['user_id'];
//        $project = $_POST['project'];
        $this->m->getTotalInvestAmount($id);
    }
=======
>>>>>>> parent of e316925... Merge branch 'master' into Dacemmi2mmi2_mainPage

}