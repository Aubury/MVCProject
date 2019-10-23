<?php


class ModelProjectPage
{
    private $db;

    public  function __construct()
    {
        include_once ROOT . "/components/Db.php";
        $this->db = new Db();
    }

    public function addProject($arr)
    {
       $prp = $this->db->con->prepare("SELECT `name` FROM `projects` WHERE `name` = '{$arr['name']}'");
       $prp->execute();
       $project = $prp->fetchAll();

       if(count($project)=== 0){

           $sqlStr = $this->db->con->prepare("INSERT INTO `projects`(`name`, `budget`, `published`, `photo_1`, `photo_2`, `photo_3`, `photo_4`, `photo_5`, `video_1`, `video_2`, `text_1`, `text_2`) 
                                                       VALUES ('{$arr['name']}', {$arr['budget']}, {$arr['published']}, {$arr['photo_1']},{$arr['photo_2']},{$arr['photo_3']},{$arr['photo_4']},
                                                       {$arr['photo_5']},{$arr['video_1']},{$arr['video_2']},'{$arr['text_1']}','{$arr['text_2']}')");
           $sqlStr->execute();
           echo "Проект добавлен";



           $admin = $_COOKIE['user_id'];
           $action = "Добавил(а) проект {$arr['name']} в базу данных";
           $sql = $this->db->con->prepare("INSERT INTO `weWatchingYou`(`id_admin`, `actions`) VALUES ('{$admin}', '{$action}')");
           $sql->execute();

       }else{

           $newStr = $this->db->con->prepare("UPDATE `projects` SET `name`= '{$arr['name']}',`budget`= '{$arr['budget']}',`published`= '{$arr['published']}',`photo_1`= '{$arr['photo_1']}',`photo_2`= '{$arr['photo_2']}',
                                                     `photo_3`= '{$arr['photo_3']}',`photo_4`= '{$arr['photo_4']}',`photo_5`= '{$arr['photo_5']}',`video_1`= '{$arr['video_1']}',`video_2`= '{$arr['video_2']}',`text_1`= '{$arr['text_1']}',`text_2`= '{$arr['text_2']}'
                                                      WHERE `name` = '{$arr['name']}'");
           $newStr->execute();
           echo "Проект изменен";

           $admin = $_COOKIE['user_id'];
           $action = "Изменил(а) проект {$arr['name']} в базе данных";
           $sql = $this->db->con->prepare("INSERT INTO `weWatchingYou`(`id_admin`, `actions`) VALUES ('{$admin}', '{$action}')");
           $sql->execute();

       }
    }
    public function getInformationProjects()
    {
        $prp = $this->db->con->prepare("SELECT * FROM `projects`");
        $prp->execute();
        $mass = $prp->fetchAll();

        $originalMass = [];
        $infMass = [];

        foreach ($mass as $value){
            array_push($originalMass,[
                'name'        => $value['name'],
                'budget'      => $value['budget'],
                'raiser_money'=> $value['raiser_money'],
                'published'=> $value['published'],
                'photo_1'  => $value['photo_1'],
                'photo_2'  => $value['photo_2'],
                'photo_3'  => $value['photo_3'],
                'photo_4'  => $value['photo_4'],
                'photo_5'  => $value['photo_5'],
                'video_1'  => $value['video_1'],
                'video_2'  => $value['video_2'],
                'text_1'   => $value['text_1'],
                'text_2'   => $value['text_1']
            ]);
        }
        foreach ($mass as $value){
            array_push($infMass,[
                'name'        => $value['name'],
                'budget'      => $value['budget'],
                'raiser_money'=> $value['raiser_money'],
                'totalRM'  => $this->TotalRiserMoney(),
                'users'    => $this->getAmountUsers($value['id']),
                'published'=> $value['published'],
                'photo_1'  => $this->getPhotoInfo($value['photo_1']),
                'photo_2'  => $this->getPhotoInfo($value['photo_2']),
                'photo_3'  => $this->getPhotoInfo($value['photo_3']),
                'photo_4'  => $this->getPhotoInfo($value['photo_4']),
                'photo_5'  => $this->getPhotoInfo($value['photo_5']),
                'video_1'  => $this->getVideoInfo($value['video_1']),
                'video_2'  => $this->getVideoInfo($value['video_2']),
                'text_1'   => $value['text_1'],
                'text_2'   => $value['text_1']
            ]);
        }
        echo json_encode([$originalMass, $infMass]);
    }
    public function getPhotoInfo($id)
    {
        $prp = $this->db->con->prepare("SELECT `name`, `direction` FROM `photos` WHERE `id`= {$id}");
        $prp->execute();
        $mass = $prp->fetchAll();

        return "{$mass[0]['direction']}{$mass[0]['name']}";
    }
    public function getVideoInfo($id)
    {
        $prp = $this->db->con->prepare("SELECT `link` FROM `video` WHERE `id` = {$id}");
        $prp->execute();
        $mass = $prp->fetchAll();

        return "{$mass[0]['link']}";
    }
    public function getAmountUsers($data)
    {
        $prp = $this->db->con->prepare("SELECT `id_user` FROM `projectUserInvestment` WHERE `id_project`='{$data}'");
//        $prp = $this->db->con->prepare("SELECT * FROM `users` WHERE `project_name`='{$data}'");
        $prp->execute();
        $users = $prp->fetchAll();
        return count($users);
    }
    public function getTotalInvestAmount($id)
    {
        $prp = $this->db->con->prepare("SELECT * FROM `projectUserInvestment` WHERE `id_user`='{$id}'");
        $prp->execute();
        $user = $prp->fetchAll();

        $money = [];
        foreach ($user as $value){
            array_push($money,[
                'project'          => $this->nameProject($value['id_project']),
                'share_investment' => $value['share_investment'],
                'invest_amount'    => $value['invest_amount'],
                'payment_time'     => $value['payment_time']
            ]);
        }

        echo json_encode($money);
    }
    public function nameProject($id)
    {
        $prp =$this->db->con->prepare("SELECT  `name` FROM `projects` WHERE `id`='{$id}'");
        $prp->execute();
        return $prp->fetchColumn();
    }
    public function TotalRiserMoney()
    {
        $prp = $this->db->con->prepare("SELECT SUM(`raiser_money`) FROM `projects`");
        $prp->execute();
        $money = $prp->fetchAll();
        return $money[0];

    }



}