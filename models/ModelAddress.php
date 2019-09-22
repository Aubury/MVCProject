<?php


class ModelAddress
{
    private $db;

    public  function __construct()
    {
        include_once ROOT . "/components/Db.php";
        $this->db = new Db();
    }

    public function addAddress($obj)
    {
      $prep = $this->db->con->prepare("SELECT `address` FROM `address` WHERE `id` = 1");
      $prep->execute();
      $arr = $prep->fetchAll();

        if(count($arr)>0){

            $up = $this->db->con->prepare("UPDATE `address` SET `address`= '{$obj}' WHERE `id` = 1");
            $up->execute();
            echo "Изменения внесены";

        }else{

            $ins = $this->db->con->prepare("INSERT INTO `address`(`address`) VALUES ('{$obj}') WHERE `id` = 1");
            $ins->execute();
            echo "Данные добавлены";

        }

    }

    public function addPhones($obj)
    {
        $prep = $this->db->con->prepare("SELECT `telephones` FROM `address` WHERE `id` = 1");
        $prep->execute();
        $arr = $prep->fetchAll();

        if(count($arr)>0){

            $up = $this->db->con->prepare("UPDATE `address` SET `telephones`= '{$obj}' WHERE `id` = 1");
            $up->execute();
            echo "Изменения внесены";

        }else{

            $ins = $this->db->con->prepare("INSERT INTO `address`(`telephones`) VALUES ('{$obj}') WHERE `id` = 1");
            $ins->execute();
            echo "Данные добавлены";

        }
    }

    public function addLink($obj)
    {
        $prep = $this->db->con->prepare("SELECT `link` FROM `address` WHERE `id` = 1");
        $prep->execute();
        $arr = $prep->fetchAll();

        if(count($arr)>0){

            $up = $this->db->con->prepare("UPDATE `address` SET `link`= '{$obj}' WHERE `id` = 1");
            $up->execute();
            echo "Изменения внесены";

        }else{

            $ins = $this->db->con->prepare("INSERT INTO `address`(`link`) VALUES ('{$obj}') WHERE `id` = 1");
            $ins->execute();
            echo "Данные добавлены";

        }

    }

}