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

        $sqlStr = $this->db->con->prepare("INSERT INTO `projects`(`name`, `budget`) VALUES ('{$arr['name']}','{$arr['budget']}')");
        $sqlStr->execute();

        $admin = $_COOKIE['user_id'];
        $action = "Добавил(а) проект {$arr['name']} в базу данных";
        $sql = $this->db->con->prepare("INSERT INTO `weWatchingYou`(`id_admin`, `actions`) VALUES ('{$admin}', '{$action}')");
        $sql->execute();

        echo "Проект добавлен";
    }

}