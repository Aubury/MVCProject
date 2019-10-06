<?php


class ControllerBudgetPage
{
   private $v, $m;

   public function __construct()
   {
       include_once ROOT . "/views/ViewBudgetPage/ViewBudgetPage.php";
       include_once ROOT . "/models/ModelBudgetPage.php";
       $this->v = new ViewBudgetPage();
       $this->m = new ModelBudgetPage();
   }

   public function actionAddToBudget()
   {
       $obj = [
           'project_name' => $_POST['project_name'],
           'email_user'   => $_POST['email_user'],
           'amount'       => $_POST['amount'],
           'timeDate'     => $_POST['timeDate']
       ];
//       var_dump($obj);
       $this->m->addMoney($obj);
   }

   public function actionShowBudgetPage()
   {
       $this->v->showBudgetPage();
   }
    public function actionShowAllProjectsName()
    {
        $this->m->ShowAllProjectsName();
    }
    public function actionTotalInf()
    {
        $this->m->TotalInformationProject();
    }

}