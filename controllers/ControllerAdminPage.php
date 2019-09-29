<?php


class ControllerAdminPage
{
    private $v, $m;

    public function __construct()
    {
        include_once ROOT . "/views/ViewAdminPage/ViewAdminPage.php";
        include_once ROOT . "/models/ModelAdminPage.php";
        $this->v = new ViewAdminPage();
        $this->m = new ModelAdminPage();
    }

    public function actionShowAdminPage()
    {
        $this->v->showAdminPage();
    }

    public function actionAddAdmin()
    {
        $obj =(array)json_decode($_GET['value']);
        $obj['password'] = substr(hash('sha256', $obj['email'] . time()), rand(0, 40), 10);

        $this->m->addAdmin($obj);
    }

    public function actionDeleteAdmin()
    {

        $this->m->DeleteAdmin($_POST['email']);
    }



}