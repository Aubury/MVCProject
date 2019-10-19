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

       if(count($user)>0){


           $prp = $this->db->con->prepare("UPDATE `users` SET `name`='{$arr['name']}',`patronymic`='{$arr['patronymic']}',`surname`='{$arr['surname']}',`email`='{$arr['email']}', `address`='{$arr['address']}',`telephon`='{$arr['telephon']}',`tax_code`= {$arr['tax_code']} WHERE `id`= $id");
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
           $sqlStr = "INSERT INTO `users`(`name`, `patronymic`, `surname`, `email`, `password`, `address`, `telephon`, `tax_code`)
                  VALUES ('{$arr['name']}','{$arr['patronymic']}', '{$arr['surname']}','{$arr['email']}','{$passH}','{$arr['address']}','{$arr['telephon']}','{$arr['tax_code']}')";


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
           $action = "Добавил(а) участника {$usr}";
           $sql = $this->db->con->prepare("INSERT INTO `weWatchingYou`(`id_admin`, `actions`) VALUES ('{$admin}', '{$action}')");
           $sql->execute();

       }
   }
   public function addUserProject($obj)
   {
       //вывод ID участника
       $prpUsr = $this->db->con->prepare("SELECT `id` FROM `users` WHERE `email`='{$obj['email']}'");
       $prpUsr->execute();
       $id_user = $prpUsr->fetchColumn();

       //вывод ID проекта
       $prpPrj = $this->db->con->prepare("SELECT `id` FROM `projects` WHERE `name`='{$obj['project_name']}'");
       $prpPrj->execute();
       $id_proj = $prpPrj->fetchColumn();

       //вывод ID соотношения проекта и участника для оплаты
       $prpUsPr = $this->db->con->prepare("SELECT `id` FROM `projectUserInvestment` 
                                                    WHERE `id_project`='{$id_proj}' AND `id_user`='{$id_user}'");
       $prpUsPr->execute();
       $id_UsPr = $prpUsPr->fetchColumn();

       if($id_UsPr>0){

           echo "Такой участник уже есть в проекту";

       }else{

           $prj =$this->db->con->prepare("INSERT INTO `projectUserInvestment`(`id_project`, `id_user`, `share_investment`)
                                              VALUES ('{$id_proj}', '{$id_user}', '{$obj['share_investment']}')");
           $prj->execute();

           $admin = $_COOKIE['user_id'];
           $action = "Добавил(а) участника к проекту {$obj['project_name']}";
           $sql = $this->db->con->prepare("INSERT INTO `weWatchingYou`(`id_admin`, `actions`) VALUES ('{$admin}', '{$action}')");
           $sql->execute();

           echo "Участник добавлен к проекту";
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

       $prp = $this->db->con->prepare("SELECT * FROM `users`");
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
             'project'   => $this->infoUserProject($value['id']),
//             'share_investment' =>  $value['share_investment'],
//             'invest_amount'    =>  $value['invest_amount'],
//             'payment_time'     =>  $value['payment_time']
           ]);
       }
      echo json_encode($massUsers);

    }
    public function infoUserProject($id_user)
    {
        $prp = $this->db->con->prepare("SELECT * FROM `projectUserInvestment` WHERE `id_user`='{$id_user}'");
        $prp->execute();
        $mass = $prp->fetchAll();

        $arrWithNames = [];
        foreach ($mass as $value){
            array_push($arrWithNames,[
                'project_name'    => $this->projectName($value['id_project']),
                'share_investment'=> $value['share_investment'],
                'invest_amount'   => $value['invest_amount'],
                'payment_time'    => $value['payment_time']
            ]);
        }

        return $arrWithNames;
    }
    public function projectName($id_project)
    {
        $prp = $this->db->con->prepare("SELECT `name` FROM `projects` WHERE `id`='{$id_project}'");
        $prp->execute();
        $name = $prp->fetchColumn();
        return $name;
    }
}