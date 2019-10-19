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
   public function actionAddUserProgect()
   {
       $obj = [
           'project_name' => $_POST['project_name'],
           'email' => $_POST['email'],
           'share_investment' => $_POST['share_investment']
       ];
//       var_dump($obj);
       $this->m->addUserProject($obj);
   }


}