<?php


class ModelAnswers
{
    private $db;

    public  function __construct()
    {
        include_once ROOT . "/components/Db.php";
        $this->db = new Db();
    }

    public function addAnswer($obj)
    {
        $admin = $_COOKIE['user_id'];
        $prep = $this->db->con->prepare("UPDATE `answers` SET `id_admin`= '{$admin}',`text`= '{$obj['text']}' WHERE `id_complaint`= '{$obj['id']}' ");
        $prep->execute();


        echo "Ответ на предложение(жалоба) № '${obj['id']}' добавлено";

        $answ = [
            'id'    => $obj['id'],
            'email' => $obj['email'],
            'text'  => $obj['text']
        ];


        $this->sendAnswer($answ);
    }

    private function sendAnswer($answ)
    {
        $msg     = "<h3>Ответ на ваше предложение(жалобу) под номером ${answ['id']} на сайте ". SITE . "</h3><br><h4>${answ['text']}</h4>";
        $to      = $answ['email'];
        $subject = "Ответ на предложение(жалобу) " . SITE;
        $headers = "MIME-Version: 1.0\r\nContent-type: text/html; charset=utf-8\r\nFrom: _mainaccount@vinash.netxi.in\r\n";
        mail($to, $subject, $msg, $headers);
    }

    public function selectTotal(){

        $prp = $this->db->con->prepare("SELECT * FROM `answers`");
        $prp->execute();
        return $prp->fetchAll();
    }

    public function totalNumAnswers()
    {
        $prp = $this->db->con->prepare("SELECT * FROM `answers` WHERE `text` != ''");
        $prp->execute();
        $num = $prp->fetchAll();

        echo count($num);

    }

}