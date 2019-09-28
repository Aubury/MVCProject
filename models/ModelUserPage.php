<?php


class ModelUserPage
{
   private $db;

   public  function __construct()
   {
       include_once ROOT . "/components/Db.php";
       $this->db = new Db();
   }

   public function addUser($arr)
   {
       $prp = $this->db->con->prepare("SELECT `email` FROM `users` WHERE `email`='{$arr['email']}'");
       $prp->execute();
       $user = $prp->fetchAll();

       if(count($user)>0){

           echo "Такой пользователь уже есть в базе данных";
       }else{

           $passH = password_hash($arr['password'], PASSWORD_BCRYPT);

           $sqlStr = "INSERT INTO `users`(`name`, `patronymic`, `surname`, `email`, `password`, `project_name`, `address`, `telephon`, `tax_code`)
                  VALUES ('{$arr['name']}','{$arr['patronymic']}', '{$arr['surname']}','{$arr['email']}','{$passH}','{$arr['project_name']}','{$arr['address']}','{$arr['telephon']}','{$arr['tax_code']}')";

           $regD = [
               'email' => $arr['email'],
               'password' => $arr['password']
           ];

           $this->db->con->exec($sqlStr);
           echo "Пользователь добавлен";
           //Формирование строки для регистрации пользователей и отправки паролей
           $this->sendRegistrationInfo($regD);

       }
   }

   public function deleteUser($user){

       $sql = $this->db->con->prepare("SELECT  `email` FROM `users` WHERE `email`='{$user}'");
       $sql->execute();
       $usr = $sql->fetchAll();
       if(count($usr)>0){

           $prp = $this->db->con->prepare("DELETE FROM `users` WHERE `email`='{$user}'");
           $prp->execute();
           echo "Участник удален";
       }else{

           echo "Такого участника нет в базе данных";
       }


   }

    private function sendRegistrationInfo($user)
    {
            $msg     = "<h3>Вас успешно зарегистрировали на сайте " . SITE . "</h3> Для авторизации используйте логин: ${user['email']} пароль: ${user['password']}";
            $to      = $user['email'];
            $subject = "Регистрация на сервере " . SITE;
            $headers = "MIME-Version: 1.0\r\nContent-type: text/html; charset=utf-8\r\nFrom: _mainaccount@vinash.netxi.in\r\n";
            mail($to, $subject, $msg, $headers);
    }
}