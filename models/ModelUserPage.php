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

    private function sendRegistrationInfo($user)
    {
            $msg     = "<h3>Вас успешно зарегистрировали на сайте " . SITE . "</h3> Для авторизации используйте логин: ${user['email']} пароль: ${user['password']}";
            $to      = $user['email'];
            $subject = "Регистрация на сервере " . SITE;
            $headers = "MIME-Version: 1.0\r\nContent-type: text/html; charset=utf-8\r\nFrom: newproject@newprojectteam.zzz.com.ua\r\n";
            mail($to, $subject, $msg, $headers);
    }
}