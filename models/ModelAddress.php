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
      $prep = $this->db->con->prepare("SELECT `address` FROM `address`");
      $prep->execute();
      $arr = $prep->fetchAll();

        if(count($arr)>0){

//            $up = $this->db->con->prepare("UPDATE `address` SET `address`= '{$obj['address']}'");
//            $up->execute();
            var_dump($obj['address']);
            echo $obj['address'];
            echo "Изменения внесены";

        }else{

            $ins = $this->db->con->prepare("INSERT INTO `address`(`address`) VALUES ('{$obj['address']}')");
            $ins->execute();
            echo "Данные добавлены";

        }

    }

    public function addPhones($obj)
    {
        $prep = $this->db->con->prepare("SELECT `telephones` FROM `address`");
        $prep->execute();
        $arr = $prep->fetchAll();

        if(count($arr)>0){

            $up = $this->db->con->prepare("UPDATE `address` SET `telephones`= '{$obj['telephones']}'");
            $up->execute();
            echo "Изменения внесены";

        }else{

            $ins = $this->db->con->prepare("INSERT INTO `address`(`telephones`) VALUES ('{$obj['telephones']}')");
            $ins->execute();
            echo "Данные добавлены";

        }
    }

    public function addLink($obj)
    {
        $prep = $this->db->con->prepare("SELECT `link` FROM `address`");
        $prep->execute();
        $arr = $prep->fetchAll();

        if(count($arr)>0){

            $up = $this->db->con->prepare("UPDATE `address` SET `link`= '{$obj['link']}'");
            $up->execute();
            echo "Изменения внесены";

        }else{

            $ins = $this->db->con->prepare("INSERT INTO `address`(`link`) VALUES ('{$obj['link']}')");
            $ins->execute();
            echo "Данные добавлены";

        }

    }

//    public function addAddress($obj)
//    {
//        $prep = $this->db->con->prepare("SELECT * FROM `address`");
//        $prep->execute();
//        $arr = $prep->fetchAll();
//
//        if(count($arr)>0){
//
//            $up = $this->db->con->prepare("UPDATE `address` SET `address`= '{$obj['address']}',`telephones`='{$obj['telephones']}',`link`='{$obj['link']}'");
//            $up->execute();
//            echo "Изменения внесены";
//
//        }else{
//
//            $ins = $this->db->con->prepare("INSERT INTO `address`(`address`, `telephones`, `link`)
//                                                     VALUES ('{$obj['address']}', '{$obj['telephones']}', '{$obj['link']}')");
//            $ins->execute();
//            echo "Данные добавлены";
//
//        }
//    }


}