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

        $strAnsw = "INSERT INTO `answers`(`id_complaint`, `email`) VALUES ('{$id}', '{$arr['email']}')";
        $this->db->con->exec($strAnsw);


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
        $headers = "MIME-Version: 1.0\r\nContent-type: text/html; charset=utf-8\r\nFrom: _mainaccount@vinash.netxi.in\r\n";
        mail($to, $subject, $msg, $headers);
    }

    private function selectTotalComplaints()
    {
        $prp = $this->db->con->prepare("SELECT * FROM `complaints_suggestions`");
        $prp->execute();
        return $prp->fetchAll();
    }

    private function selectTotalAnswers()
    {
        $prp = $this->db->con->prepare("SELECT * FROM `answers`");
        $prp->execute();
        return $prp->fetchAll();
    }

    public function totalNumComplaints()
    {
       $num = $this->selectTotalComplaints();
        echo count($num);
    }

    public function totalNumNewComplaints()
    {
        if(array_key_exists('user_id', $_COOKIE)){
            $admin = $_COOKIE['user_id'];

            $prp = $this->db->con->prepare("SELECT * FROM `admins` WHERE `id` = '{$admin}'");
            $prp->execute();
            $arr = $prp->fetchAll();

            $lastVisit = $arr['last_visit'];

            $sql = $this->db->con->prepare("SELECT * FROM `complaints_suggestions` WHERE `date` < '{$lastVisit}'");
            $sql->execute();
            $num = $sql->fetchAll();

            echo count($num);
        }

    }

    public function totalAnswerComplaints()
    {
       $answ = $this->selectTotalAnswers();
       $compl = $this->selectTotalComplaints();
       $massAnsw = [];
       $massCompl = [];

       foreach ($answ as $value)
       {
               array_push($massAnsw, [
                       'Ответ на жалобу №'.$value['id_complaint'],
                       $value['date_time'],
                       $value['text']? $value['text']: 'No answer'
                       ]
               );

       }
       foreach ($compl as $value)
       {

               array_push($massCompl, [
                   $value['user'], 
                   'Жалоба №'.$value['id'], 
                   $value['email'],
                   $value['date'], 
                   $value['text']
               ]);

       }


       echo json_encode([
           'complains'=>$massCompl,
           'answers'  => $massAnsw
       ]);

    }
}