<?php


class ModelIsAuth
{

    private $db, $m;

    public  function __construct()
    {
        include_once ROOT . "/components/Db.php";
        include_once ROOT . "models/ModelIsAuth.php";
        $this->db = new Db();
        $this->m = new ModelLogin();

    }
    public function checkLog($uid, $upd, $tab)
    {
        $p = $this->db->con->prepare("SELECT * FROM `logIn` WHERE `user_id`='${uid}'");
        $p->execute();
        $arr = $p->fetchAll();

        if(count($arr) > 0)
        {
            if(hash_equals($upd, $arr[0]['uPd']))
            {
                if($tab === 'supAdm'){

                    $this->m->lastVisit($uid, 'admins');
                    header('Location:'.SITE .'/show/superAdmin');

                }
                if($tab === 'adm'){

                    $this->m->lastVisit($uid, 'admins');
                    header('Location:'.SITE . '/show/Panel');
                }
                if($tab === 'usr'){

                    $this->m->lastVisit($uid, 'users');
                    header('Location:'.SITE .'/show/User');
                }
            }
            return false;
        }

        return false;
    }

}