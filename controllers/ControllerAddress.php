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

       if(array_key_exists( 'address', $_POST)){

           $this->m->addAddress($_POST['address']);
       }
       if(array_key_exists( 'telephones', $_POST)){

           $this->m->addPhones($_POST['telephones']);;
       }
       if(array_key_exists( 'link', $_POST)){

           $this->m->addLink($_POST['link']);;
       }



   }
   public function actionShowPanelAddress()
   {
       $this->v->showAddress();
   }
}