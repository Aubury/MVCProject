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
        echo "Видео  добавлен";

    }
}