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
       $this->m->addMoney();
   }

   public function actionShowBudgetPage()
   {
       $this->v->showBudgetPage();
   }

}