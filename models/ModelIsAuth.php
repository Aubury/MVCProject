<?php


class ModelIsAuth
{

    private $db, $m;

    public  function __construct()
    {
        include_once ROOT . "/components/Db.php";
        // include_once ROOT . "models/ModelIsAuth.php";
        $this->db = new Db();
        // $this->m = new ModelLogin();

    }
    public function checkLog($uid, $upd, $tab)
    {
        $p = $this->db->con->prepare("SELECT * FROM `logIn` WHERE `user_id`='${uid}' AND `table`='${tab}'");
        $p->execute();
        $arr = $p->fetchAll();

        if(count($arr) > 0)
        {
            if(hash_equals($upd, $arr[0]['uPd']) && $tab == $arr[0]['table'])
            {
                $this->lastVisit($uid, $tab);
                return true;
            }
        }
        return false;
    }
   
    //---------------------------------------------------------------------------------------------------------------------------------
    private  function lastVisit($obj, $table)
    {
        $t = ($table == 'adm' || $table == 'supAdm')? 'admins': 'users';

        $prep = $this->db->con->prepare("UPDATE `$t` SET `last_visit`= NOW() WHERE `id` = '{$obj['id']}'");
        $prep->execute();
    }

}