<?php


class ControllerAnswers
{
    private $v, $m;

    public function __construct()
    {
        include_once ROOT . "/views/ViewSuperAdminPage/ViewSuperAdminPage.php";
        include_once ROOT . "/models/ModelAnswers.php";

        $this->v = new ViewSuperAdminPage();
        $this->m = new  ModelAnswers();

    }

    public function actionAddAnswers()
    {
        $obj = [

            'id'   => $_POST['id'],
            'email' => $_POST['email'],
            'text' => $_POST['text']
        ];


        $this->m->addAnswer($obj);
    }
    public function actionNumAnswers()
    {
        $this->m->totalNumAnswers();
    }

}