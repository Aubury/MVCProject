<?php


class ControllerIsAuth
{
    private $v, $m;

    public function __construct()
    {
        include_once ROOT . "/models/ModelIsAuth.php";
        $this->m = new ModelIsAuth();
    }

    public function IsAuth()
    {

        if(array_key_exists( 'uId', $_COOKIE))
        {
          return  $this->m->checkLog($_COOKIE['uId'], $_COOKIE['uPd'], $_COOKIE['tab']);
        }

     return false;
    }

}