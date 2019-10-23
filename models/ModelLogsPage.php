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
        echo json_encode($allLogs);
    }

    private function getName($id)
    {
        $nameAdm = $this->getColumn('name',$id);
        $patrAdm = $this->getColumn('patronymic',$id);
        $surAdm = $this->getColumn('surname',$id);
        $name = "{$surAdm} {$nameAdm} {$patrAdm}";
        return $name;
    }

    private function getColumn($data, $id)
    {
        $adprp = $this->db->con->prepare("SELECT {$data} FROM `admins` WHERE `id`={$id}");
        $adprp->execute();
        return $adprp->fetchColumn();
    }
}