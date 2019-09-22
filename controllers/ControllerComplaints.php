<?php


class ControllerComplaints
{
    private $v, $m;

    public function __construct()
    {
        include_once ROOT . "/views/ViewPersonalPage/ViewPersonalPage.php";
        include_once ROOT . "/models/ModelComplaints.php";
        $this->v = new ViewPersonalPage();
        $this->m = new ModelComplaints();
    }

    public function actionAddComplaints()
    {
//        var_dump($_GET);
        $obj =(array)json_decode($_GET['value']);
        $this->m->addComplaints($obj);
    }


}