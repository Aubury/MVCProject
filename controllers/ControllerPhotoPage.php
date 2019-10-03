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
   public function actionAddPhoto()
   {
       // если была произведена отправка формы
       if(isset($_FILES['file'])) {
           // проверяем, можно ли загружать изображение
           $check = $this->m->can_upload($_FILES['file']);

           if ($check === true) {
               $img_url = $_FILES['file']['name'];
               $tmp_name_img= $_FILES['file']['tmp_name'];
               $size_img = $_FILES['file']['size'];
               $this->m->downloadImg($img_url, $tmp_name_img, $size_img);

           } else {
               // выводим сообщение об ошибке
               echo "<strong>$check</strong>";
           }
       }

   }
}