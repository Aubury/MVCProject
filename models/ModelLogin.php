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
  //      $passH = password_hash($arr['password'], PASSWORD_BCRYPT);

//        echo $passH.PHP_EOL;
//        echo $admin[0]['password'].PHP_EOL;
//        echo $user[0]['password'].PHP_EOL;
//        echo password_verify($arr['password'], $admin[0]['password']).PHP_EOL;
//===========================================================================================


        if(count($admin)<0 || count($user)<0){

            return;

        }else{
            if(count($admin)>0){

                if(password_verify($arr['password'], $admin[0]['password'])) {

                    $str = $this->db->con->prepare("UPDATE `admins` SET `last_visit`= NOW() WHERE `email`='${arr['email']}'");
                    $str->execute();


                    if ($role) {
                        
                      echo json_encode([
                            SITE . "/show/superAdmin",
                            $this->addUserLog($admin[0], 'supAdm')]);
              //          $this->redirect('/show/superAdmin');
//                        header('Location:'.SITE.'/show/superAdmin');

                    } else {
                       ;
                       echo json_encode([
                            SITE . "/show/Panel"],
                            $this->addUserLog($admin[0], 'adm'));
                     //   $this->redirect('/show/Panel');
//                        header('Location:'.SITE.'/show/Panel');
                    }

                }else{

                    return;
                }

            }else{

                if(password_verify($arr['password'], $user[0]['password'])) {

                    $str = $this->db->con->prepare("UPDATE `users` SET `last_visit`= NOW() WHERE `email`='${arr['email']}'");
                    $str->execute();
                    $this->addUserLog($user[0], 'usr');//TODO: same as admin!!!
                   echo json_encode([SITE . "/show/User"]);
                 //   $this->redirect('/show/User');
//                    header('Location:'.SITE.'/show/User');

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
            return [$uPd, $user['id'], $tab];
            // setcookie('uId', $user['id']);
            // setcookie('uPd', $uPd);
            // setcookie('tab', $tab);

        }else{
            return [$arr[0]['uPd'], $arr[0]['user_id'], $arr[0]['table']];   
            // setcookie('uId', $arr[0]['user_id']);
            // setcookie('uPd', $arr[0]['uPd']);
            // setcookie('tab', $arr[0]['table']);

        }
    }

    public function redirect($url) {

       // header('HTTP/1.1 200 OK');
        header('Location: https://'.$_SERVER['HTTP_HOST']. $url);
        exit();
    }

//    public function checkLog($uid, $upd, $tab)
//    {
//        $p = $this->db->con->prepare("SELECT * FROM `logIn` WHERE `user_id`='${uid}'");
//        $p->execute();
//        $arr = $p->fetchAll();
//
//        if(count($arr) > 0)
//        {
//            if(hash_equals($upd, $arr[0]['uPd']))
//            {
//                if($tab === 'supAdm'){
//
//                    $this->lastVisit($uid, 'admins');
//                    echo json_encode([SITE . "/show/superAdmin"]);
//                }
//                if($tab === 'adm'){
//
//                    $this->lastVisit($uid, 'admins');
//                    echo json_encode([SITE . "/show/Panel"]);
//                }
//                if($tab === 'usr'){
//
//                    $this->lastVisit($uid, 'users');
//                    echo json_encode([SITE . "/show/User"]);
//                }
//            }
//            return;
//        }
//
//        return;
//    }

}