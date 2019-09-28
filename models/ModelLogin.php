<?php


class ModelLogin
{
    private $db;

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

//------------------------------------------------------------------------------------------------------------------------------
    public function getIn($arr)
    {

        $admin = $this->dbSelect($arr,'email', 'admins');
        $user  = $this->dbSelect($arr,'email', 'users');
        $role = $admin[0]['role'];

        if(count($admin)<0 || count($user)<0){

            return;

        }else{
            if(count($admin)>0){

                if(password_verify($arr['password'], $admin[0]['password'])) {

                    $str = $this->db->con->prepare("UPDATE `admins` SET `last_visit`= NOW() WHERE `email`='{$arr['email']}'");
                    $str->execute();

                    $action = "Вошел(а) на сайт";
                    $sql = $this->db->con->prepare("INSERT INTO `weWatchingYou`(`id_admin`, `actions`) VALUES ('{$admin[0]['id']}', '{$action}')");
                    $sql->execute();

                    if ($role) {
                        
                      echo json_encode([
                            SITE . "/show/superAdmin",
                            $this->addUserLog($admin[0], 'supAdm')]);


                    } else {
                       ;
                       echo json_encode([
                            SITE . "/show/Panel"],
                            $this->addUserLog($admin[0], 'adm'));
                    }

                }else{

                    return;
                }

            }else{

                if(password_verify($arr['password'], $user[0]['password'])) {

                    $str = $this->db->con->prepare("UPDATE `users` SET `last_visit`= NOW() WHERE `email`='{$arr['email']}'");
                    $str->execute();
                    $this->addUserLog($user[0], 'usr');//TODO: same as admin!!!
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
            $this->db->con->exec("INSERT INTO `logIn`(`user_id`, `uPd`, `role`, `table`) VALUES ( '{$user['id']}', '${uPd}', '{$user['role']}', '{$tab}')");
            return [$uPd, $user['id'], $tab];


        }else{
            return [$arr[0]['uPd'], $arr[0]['user_id'], $arr[0]['table']];   

        }
    }

    public function redirect($url) {

        header('Location: https://'.$_SERVER['HTTP_HOST']. $url);
        exit();
    }

}