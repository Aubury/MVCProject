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
        $sqlStr = "INSERT INTO `projects`(`name`, `budget`, `raiser_money`)
                  VALUES ('{$arr['name']}','{$arr['budget']}', '{$arr['raiser_money']}')";

        $this->db->con->exec($sqlStr);

        echo "Проект добавлен";
    }

}