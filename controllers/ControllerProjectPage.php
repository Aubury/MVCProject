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
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> parent of 1f249eb... Merge pull request #2 from Aubury/Dacemmi2mmi2_mainPage
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
<<<<<<< HEAD
=======
>>>>>>> parent of e316925... Merge branch 'master' into Dacemmi2mmi2_mainPage
=======
>>>>>>> parent of 1f249eb... Merge pull request #2 from Aubury/Dacemmi2mmi2_mainPage
=======
>>>>>>> parent of e316925... Merge branch 'master' into Dacemmi2mmi2_mainPage

}