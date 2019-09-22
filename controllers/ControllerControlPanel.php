<?php


class ControllerControlPanel
{
   private $v, $m;

   public function __construct()
   {
       include_once ROOT . "/views/ViewControlPanel/ViewControlPanel.php";
       include_once ROOT . "/models/ModelControlPanel.php";
       $this->v = new ViewControlPanel();
       $this->m = new ModelControlPanel();
   }

   public function actionShowControlPanel()
   {
       $this->v->showControlPanel();
   }
}