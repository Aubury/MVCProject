<?php


class ControllerPhotoPage
{
   private $v, $m;

   public function __construct()
   {
       include_once ROOT . "/views/ViewPhotoPage/ViewPhotoPage.php";
       include_once ROOT . "/models/ModelPhotoPage.php";
       $this->m = new ModelPhotoPage();
       $this->v = new ViewPhotoPage();
   }

   public function actionShowPhotoPage()
   {
       $this->v->showPhotoPage();
   }
}