<?php


class ModelLogin
{
    private $db, $cA, $cP, $cSa;
    public $table;

    public  function __construct()
    {
        include_once ROOT . "/components/Db.php";
        $this->db = new Db();

    }
//---------------------------------------------------------------------------------------------------------------------------------
    public function dbSelect($obj, $name, $table){

        $prep = $this->db->con->prepare("SELECT * FROM  `$table` WHERE `$name` = '{$obj[$name]}'");
        $prep->execute();
        return  $prep->fetchAll();

    }
//---------------------------------------------------------------------------------------------------------------------------------
    public  function lastVisit($obj, $table)
    {
        $prep = $this->db->con->prepare("UPDATE `$table` SET `last_visit`= NOW() WHERE `id` = '{$obj['id']}'");
        $prep->execute();

    }
//------------------------------------------------------------------------------------------------------------------------------
    public function getIn($arr)
    {

        $admin = $this->dbSelect($arr,'email', 'admins');
        $user  = $this->dbSelect($arr,'email', 'users');
        $role = $admin[0]['role'];

//===========================================================================================


        if(count($admin)<0 || count($user)<0){

            return;

        }else{
            if(count($admin)>0){

                if( password_verify($arr['password'], $admin[0]['password'])) {

                    $str = $this->db->con->prepare("UPDATE `admins` SET `last_visit`= NOW() WHERE `email`='${arr['email']}'");
                    $str->execute();


                    if ($role) {
                        $this->addUserLog($admin[0], 'supAdm');
                        echo json_encode([SITE . "/show/superAdmin"]);


                    } else {
                        $this->addUserLog($admin[0], 'adm');
                        echo json_encode([SITE . "/show/Panel"]);

                    }

                }else{

                    return;
                }

            }else{

                if(password_verify($arr['password'], $admin[0]['password'])) {

                    $str = $this->db->con->prepare("UPDATE `users` SET `last_visit`= NOW() WHERE `email`='${arr['email']}'");
                    $str->execute();
                    $this->addUserLog($user[0], 'usr');
                    echo json_encode([SITE . "/show/User"]);


                }else{

                    return;
                }

            }
        }

    }
    private function addUserLog($user, $tab){

        $log = $this->db->con->prepare("SELECT * FROM `logIn` WHERE `user_id` = '${user['id']}'");
        $log->execute();
        $arr = $log->fetchAll();

        if(count($arr) == 0){

            $uPd = password_hash(time() . $user['email'], PASSWORD_BCRYPT);
            $this->db->con->exec("INSERT INTO `logIn`(`user_id`, `uPd`, `role`, `table`) VALUES ( ${user['id']}, '${uPd}', ${user['role']}, '${tab}')");
            setcookie('uId', $user['id']);
            setcookie('uPd', $uPd);
            setcookie('tab', $tab);

        }else{

            setcookie('uId', $arr[0]['user_id']);
            setcookie('uPd', $arr[0]['uPd']);
            setcookie('tab', $arr[0]['table']);

        }
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

                    $this->lastVisit($uid, 'admins');
                    echo json_encode([SITE . "/show/superAdmin"]);
                }
                if($tab === 'adm'){

                    $this->lastVisit($uid, 'admins');
                    echo json_encode([SITE . "/show/Panel"]);
                }
                if($tab === 'usr'){

                    $this->lastVisit($uid, 'users');
                    echo json_encode([SITE . "/show/User"]);
                }
            }
            return;
        }

        return;
    }

}