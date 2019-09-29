<?php


class ModelLogsPage
{
    private $db;

    public  function __construct()
    {
        include_once ROOT . "/components/Db.php";
        $this->db = new Db();
    }
    public function TotalLogs()
    {
        $prp = $this->db->con->prepare("SELECT * FROM `weWatchingYou` ORDER BY `timeDate` DESC");
        $prp->execute();
        $massLog = $prp->fetchAll();

        $allLogs = [];

        foreach ($massLog as $value)
        {
            array_push($allLogs, [
                    $this->getName($value['id_admin']),
                    $value['actions'],
                    $value['timeDate']
                ]);
        }
        return json_encode($allLogs);
    }

    private function getName($id)
    {
        $adprp = $this->db->con->prepare("SELECT `name`, `patronymic`, `surname` FROM `admins` WHERE `id`={$id}");
        $adprp->execute();
        $adm = $adprp->fetchAll();

        return "{$adm[0]['surname']} {$adm[0]['name']}  {$adm[0]['patronymic']}";
    }
}