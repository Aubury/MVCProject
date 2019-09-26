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
        echo "Админ добавлен";
        //Формирование строки для регистрации пользователей и отправки паролей
        $this->sendRegistrationInfo($regD);
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