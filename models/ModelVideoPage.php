<?php


class ModelVideoPage
{
    private $db;

    public  function __construct()
    {
        include_once ROOT . "/components/Db.php";
        $this->db = new Db();
    }

    public function addVideo($arr)
    {

        $sqlStr = "INSERT INTO `video`(`name`, `project_name`, `link`)
                   VALUES ('{$arr['name']}','{$arr['project_name']}', '{$arr['link']}')";

        $this->db->con->exec($sqlStr);

        $admin = $_COOKIE['user_id'];
        $action = "Добавил(а) видео \"{$arr['name']}\" к проекту {$arr['project_name']}";
        $sql = $this->db->con->prepare("INSERT INTO `weWatchingYou`(`id_admin`, `actions`) VALUES ('{$admin}', '{$action}')");
        $sql->execute();

        echo "Видео  добавлен";

    }
    public function TotalVideo()
    {
        $prp = $this->db->con->prepare("SELECT * FROM `video`");
        $prp->execute();
        $mass = $prp->fetchAll();

        $videos = [];

        foreach ($mass as $value){

            array_push($videos, [
                $value['id'],
                $value['name'],
                $value['project_name'],
                $value['link'],
                $value['loud_date']

            ]);
        }

        echo json_encode($videos);
    }
}