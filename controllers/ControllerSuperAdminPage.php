<?php


class ControllerSuperAdminPage
{
    private $v, $m;

    public function __construct()
    {
        include_once ROOT . "/views/ViewSuperAdminPage/ViewSuperAdminPage.php";
        include_once ROOT . "/models/ModelSuperAdminPage.php";
        $this->v = new ViewSuperAdminPage();
        $this->m = new ModelSuperAdminPage();
    }

    public function actionShowSuperAdminPage()
    {
        $this->v->showSuperAdmin();
    }

}