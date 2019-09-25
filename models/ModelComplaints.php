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

    }

    public function totalAnswerComplaints()
    {
       $answ = $this->selectTotalAnswers();
       $compl = $this->selectTotalComplaints();
       $massAnsw = [];
       $massCompl = [];

       foreach ($answ as $value)
       {
               $mass = [

//               0 => $value['user'],
               0 => 'Ответ на жалобу №'.$value['id_complaint'],
//               2 => $value['email'],
               1 => $value['date_time'],
               2 => $value['text']

           ];

               array_push($massAnsw, $mass);

       }
       foreach ($compl as $value)
       {

               $mass = [

                   0 => $value['user'],
                   1 => 'Жалоба №'.$value['id'],
                   2 => $value['email'],
                   3  => $value['date'],
                   4  => $value['text']
               ];

               array_push($massCompl, $mass);

       }

       $arr = [
           'complains'=>$massCompl,
           'answers'  => $massAnsw
       ];

       echo json_encode($arr);

    }
}