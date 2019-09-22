<?php


class ModelComplaints
{

    private $db;

    public  function __construct()
    {
        include_once ROOT . "/components/Db.php";
        $this->db = new Db();
    }

    public function addComplaints($arr)
    {

        $sqlStr = "INSERT INTO `complaints_suggestions`(`user`, `email`, `text` )
                   VALUES ('{$arr['user']}', '{$arr['email']}','{$arr['text']}')";

        $this->db->con->exec($sqlStr);
        $id = $this->db->con->lastInsertId();
        echo "Жалоба под № $id подана на рассмотрение";

        $regD = [
            'email'    => $arr['email'],
            'id'       => $id,

        ];

        $this->sendRegistrationInfo($regD);

    }

    private function sendRegistrationInfo($user)
    {
        $msg     = "<h3>Ваше предложение(жалоба) под номером ${user['id']} на сайте ". SITE . "</h3> подана на рассмотрение";
        $to      = $user['email'];
        $subject = "Регистрация предложение(жалоба) " . SITE;
        $headers = "MIME-Version: 1.0\r\nContent-type: text/html; charset=utf-8\r\nFrom: newproject@newprojectteam.zzz.com.ua\r\n";
        mail($to, $subject, $msg, $headers);
    }
}