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
       $prp = $this->db->con->prepare("SELECT * FROM `users` WHERE `email`='{$arr['email']}'");
       $prp->execute();
       $user = $prp->fetchAll();
       $id = $user[0]['id'];
//      var_dump($user);
//      echo $id;
       if(count($user)>0){

           $prp = $this->db->con->prepare("UPDATE `users` SET `name`='{$arr['name']}',`patronymic`='{$arr['patronymic']}',`surname`='{$arr['surname']}',`email`='{$arr['email']}', `project_name`='{$arr['project_name']}', `share_investment`= '{$arr['share_investment']}', `address`='{$arr['address']}',`telephon`='{$arr['telephon']}',`tax_code`= {$arr['tax_code']} WHERE `id`= $id");
           $prp->execute();
           echo "Данные участника изменены";
           $admin = $_COOKIE['user_id'];
           $usr = $arr['name']." ".$arr['patronymic']." ".$arr['surname'];
           $action = "Изменил(а) данные участника {$usr}";
           $sql = $this->db->con->prepare("INSERT INTO `weWatchingYou`(`id_admin`, `actions`) VALUES ('{$admin}', '{$action}')");
           $sql->execute();

       }else{

           $obj['password'] = substr(hash('sha256', $arr['email'] . time()), rand(0, 40), 10);
           $passH = password_hash($obj['password'], PASSWORD_BCRYPT);
           $sqlStr = "INSERT INTO `users`(`name`, `patronymic`, `surname`, `email`, `password`, `project_name`, `share_investment`, `address`, `telephon`, `tax_code`)
                  VALUES ('{$arr['name']}','{$arr['patronymic']}', '{$arr['surname']}','{$arr['email']}','{$passH}','{$arr['project_name']}', '{$arr['share_investment']}', '{$arr['address']}','{$arr['telephon']}','{$arr['tax_code']}')";


           $regD = [
               'email' => $arr['email'],
               'password' => $arr['password']
           ];

           $this->db->con->exec($sqlStr);
           echo "Пользователь добавлен";
           //Формирование строки для регистрации пользователей и отправки паролей
           $this->sendRegistrationInfo($regD);

           $admin = $_COOKIE['user_id'];
           $usr = $arr['name']." ".$arr['patronymic']." ".$arr['surname'];
           $action = "Добавил(а) участника {$usr} к проекту {$arr['project_name']}";
           $sql = $this->db->con->prepare("INSERT INTO `weWatchingYou`(`id_admin`, `actions`) VALUES ('{$admin}', '{$action}')");
           $sql->execute();

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

    public function TotalInformationUsers()
    {
       $prp = $this->db->con->prepare("SELECT * FROM `users` ORDER BY `users`.`project_name` ASC");
       $prp->execute();
       $mass = $prp->fetchAll();

       $massUsers = [];

       foreach ($mass as $value){

           array_push($massUsers, [
             'surname'   => $value['surname'],
             'name'      => $value['name'],
             'patronymic'=> $value['patronymic'],
             'telephon'  => $value['telephon'],
             'email'     => $value['email'],
             'address'   => $value['address'],
             'tax_code'  => $value['tax_code'],
             'project_name' => $value['project_name'],
             'share_investment' =>  $value['share_investment'],
             'invest_amount'    =>  $value['invest_amount'],
             'payment_time'     =>  $value['payment_time']
           ]);
       }
      echo json_encode($massUsers);

    }
}