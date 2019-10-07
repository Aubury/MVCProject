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
        var_dump($arr);
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

}