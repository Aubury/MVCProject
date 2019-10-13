<?php


class ModelBudgetPage
{
    private $db;

    public  function __construct()
    {
        include_once ROOT . "/components/Db.php";
        $this->db = new Db();

    }

    public function addMoney($obj)
    {
        //вывод данных о плательщике
        $sql = $this->db->con->prepare("SELECT * FROM `users` WHERE `email`='{$obj['email_user']}'");
        $sql->execute();
        $user = $sql->fetchAll();

        if(count($user)>0){
            if($user[0]['project_name'] == $obj['project_name']){

                //запись в базу 'budget'
                $prp = $this->db->con->prepare("INSERT INTO `budget`(`project_name`, `email_user`, `amount`, `timeDate`)
                                                 VALUES ('{$obj['project_name']}', '{$obj['email_user']}', '{$obj['amount']}', '{$obj['timeDate']}')");
                $prp->execute();
                //запись в базу  'users'
                $str = $this->db->con->prepare("UPDATE `users` SET `invest_amount`= invest_amount + '{$obj['amount']}',`payment_time`='{$obj['timeDate']}'
                                                 WHERE `email`='{$obj['email_user']}'");
                $str->execute();

                //запись в базу 'projects'
                $proj = $this->db->con->prepare("UPDATE `projects` SET `raiser_money`= raiser_money + '{$obj['amount']}' WHERE `name`= '{$obj['project_name']}'");
                $proj->execute();

                $admin = $_COOKIE['user_id'];
                $name = "{$user[0]['surname']} {$user[0]['name']}  {$user[0]['patronymic']}";
                $action = "Добавил(а) платёж от {$name} в фонд проекта {$obj['project_name']}";
                $sql = $this->db->con->prepare("INSERT INTO `weWatchingYou`(`id_admin`, `actions`) VALUES ('{$admin}', '{$action}')");
                $sql->execute();

                echo "Платёж добавлен";

            }else{

                echo "В {$obj['project_name']} нет такого участника";
            }

        }else{

            echo "Такого участника в базе нет";
        }




    }
    public function ShowAllProjectsName()
    {
        $prp = $this->db->con->prepare("SELECT `name` FROM `projects`");
        $prp->execute();
        $names = $prp->fetchAll();

        echo json_encode($names);
    }
    public function TotalInformationProject()
    {
        $prp = $this->db->con->prepare("SELECT * FROM `budget` ORDER BY `timeDate` DESC");
        $prp->execute();
        $mass = $prp->fetchAll();

        $arr = [];
        foreach ($mass as $value){

            array_push($arr,[
                $value['timeDate'],
                $this->User($value['email_user']),
                $value['amount'],
                $value['project_name']
            ]);
        }
       echo json_encode($arr);
    }
    public function User($email)
    {
        $nameUser = $this->getColumn('name', $email);
        $patrUser = $this->getColumn('patronymic', $email);
        $surUser = $this->getColumn('surname', $email);
        $name = "{$surUser} {$nameUser} {$patrUser}";
        return $name;

    }
    private function getColumn($data, $email)
    {
        $adprp = $this->db->con->prepare("SELECT $data FROM `users`  WHERE `email`='{$email}'");
        $adprp->execute();
        return $adprp->fetchColumn();
    }

}