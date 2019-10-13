<?php


class ControllerUserPage
{
    private $v, $m;

    public function __construct()
    {
        include_once ROOT . "/views/ViewUsersPage/ViewUsersPage.php";
        include_once ROOT . "/models/ModelUserPage.php";
        $this->v = new ViewUsersPage();
        $this->m = new ModelUserPage();
    }


    public function actionAddUser()
    {
        $obj =(array)json_decode($_GET['value']);
        $obj['password'] = substr(hash('sha256', $obj['email'] . time()), rand(0, 40), 10);
        $this->m->addUser($obj);
   }

   public function actionDelUser()
   {
       $this->m->deleteUser($_POST['email']);
   }

   public function actionShowUsersPage()
   {
       $this->v->showUsersPage();
   }
   public function actionTotalUsers()
   {
       $this->m->TotalInformationUsers();
   }


}