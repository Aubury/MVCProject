<?php


class ModelAdminPage
{
    private $db;

    public  function __construct()
    {
        include_once ROOT . "/components/Db.php";
        $this->db = new Db();
    }

    public function addAdmin($arr)
    {

        $passH = password_hash($arr['password'], PASSWORD_BCRYPT);

        $sqlStr = "INSERT INTO `admins`(`name`, `patronymic`, `surname`, `email`, `password`)
                   VALUES ('{$arr['name']}','{$arr['patronymic']}', '{$arr['surname']}','{$arr['email']}','{$passH}')";

        $regD = [
            'email' => $arr['email'],
            'password' => $arr['password']
        ];

        $this->db->con->exec($sqlStr);

        $admin = $_COOKIE['user_id'];
        $name = "{$arr['surname']} {$arr['name']}  {$arr['patronymic']}";
        $action = "Админ- {$name} добавлен в базу данных";
        $sql = $this->db->con->prepare("INSERT INTO `weWatchingYou`(`id_admin`, `actions`) VALUES ('{$admin}', '{$action}')");
        $sql->execute();

        echo "Админ добавлен";
        //Формирование строки для регистрации пользователей и отправки паролей
        $this->sendRegistrationInfo($regD);
    }

    public function DeleteAdmin($admin)
    {
        $sql = $this->db->con->prepare("SELECT * FROM `admins` WHERE `email` = '{$admin}'");
        $sql->execute();
        $bdAdm = $sql->fetchAll();

        if(count($bdAdm)>0){
            $prp = $this->db->con->prepare("DELETE FROM `admins` WHERE `email` = '{$admin}'");
            $prp->execute();

            $admin = $_COOKIE['user_id'];
            $name = "{$bdAdm[0]['surname']} {$bdAdm[0]['name']}  {$bdAdm[0]['patronymic']}";
            $action = "Админ- {$name} удален из базы данных";
            $sql = $this->db->con->prepare("INSERT INTO `weWatchingYou`(`id_admin`, `actions`) VALUES ('{$admin}', '{$action}')");
            $sql->execute();


            echo "Админ: {$bdAdm[0]['surname']} {$bdAdm[0]['name']} {$bdAdm[0]['patronymic']} удален из базы данных";
        }else{

            echo "Админа с Email- {$admin} нет в базе";
        }


    }
    private function sendRegistrationInfo($user)
    {
        $msg     = "<h3>Вас успешно зарегистрировали на сайте как администратора " . SITE . "</h3> Для авторизации используйте логин: ${user['email']} пароль: ${user['password']}";
        $to      = $user['email'];
        $subject = "Регистрация на сервере " . SITE;
        $headers = "MIME-Version: 1.0\r\nContent-type: text/html; charset=utf-8\r\nFrom: _mainaccount@vinash.netxi.in\r\n";
        mail($to, $subject, $msg, $headers);
    }

}