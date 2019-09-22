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

       $prep = $this->db->con->prepare("INSERT INTO `answers`(`id_complaint`, `email`, `text`)
                                          VALUES ('{$obj['id']}', '{$obj['email']}', '{$obj['text']}')");
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
        $headers = "MIME-Version: 1.0\r\nContent-type: text/html; charset=utf-8\r\nFrom: newproject@newprojectteam.zzz.com.ua\r\n";
        mail($to, $subject, $msg, $headers);
    }

}