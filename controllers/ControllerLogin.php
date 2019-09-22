<?php


class ControllerLogin
{
    private $v, $m;

    public function __construct()
    {
        include_once ROOT . "/views/ViewMainPage/ViewMainPage.php";
        include_once ROOT . "/models/ModelLogin.php";
        $this->v = new ViewMainPage();
        $this->m = new ModelLogin();
    }

    public function actionLogIn()
    {
        $obj = [
            'email'   => $_POST['email'],
            'password'=> $_POST['password']
        ];

        if(array_key_exists('uId',$_COOKIE))
        {
            $this->m->checkLog($_COOKIE['uId'], $_COOKIE['uPd'], $_COOKIE['tab']);
        }

         $this->m->getIn($obj);
    }


}