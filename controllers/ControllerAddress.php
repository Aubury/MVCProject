<?php


class ControllerAddress
{
   private $v, $m;

   public function __construct()
   {
       include_once ROOT . "/views/ViewAddress/ViewAddress.php";
       include_once ROOT . "/models/ModelAddress.php";
       $this->v = new ViewAddress();
       $this->m = new ModelAddress();
   }
   public function actionAddAddress()
   {

       switch ($_POST){

           case array_key_exists( 'address', $_POST):
                $this->m->addAddress($_POST['address']);
                break;

           case array_key_exists( 'telephones', $_POST):
               $this->m->addPhones($_POST['telephones']);
               break;

           case array_key_exists( 'link', $_POST):
               $this->m->addLink($_POST['link']);
               break;
       }

   }
   public function actionShowPanelAddress()
   {
       $this->v->showAddress();
   }
}