<?php


class ModelVideo
{
    private $db;
    public function __construct()
    {
        include_once ROOT . "/components/Db.php";
        $this->db = new Db();
    }

 
    public function getVideos()
    {


    
        $pp = $this->db->con->prepare("SELECT * FROM `projects`");
        $pp->execute();

        $arrprojects = $pp->fetchAll();
        // var_dump($arrprojects);

        
        $linkVideo=$arrprojects[0] ["budget"];
        // echo $linkVideo;


        // foreach($arrprojects[1] as $fort){
        // echo $fort.'<br>';
        // }
    }
}

    // [0]=> array(22) { 
    //                     ["id"]=> string(1) "1"
    //                     [0]=> string(1) "1" 
    //                     ["name"]=> string(6) "Дом"
    //                     [1]=> string(6) "Дом"
    //                     ["budget"]=> string(7) "1000000" 
    //                     [2]=> string(7) "1000000"
    //                     ["raiser_money"]=> string(4) "2000" 
    //                     [3]=> string(4) "2000" 
    //                     ["link_logo"]=> string(0) ""
    //                     [4]=> string(0) "" 
    //                     ["img1"]=> string(0) ""
    //                     [5]=> string(0) ""
    //                     ["img2"]=> string(0) ""
    //                     [6]=> string(0) ""
    //                     ["img3"]=> string(0) ""
    //                     [7]=> string(0) ""
    //                     ["img4"]=> string(0) ""
    //                     [8]=> string(0) ""
    //                     ["link_video1"]=> string(0) ""
    //                     [9]=> string(0) ""
    //                     ["link_video2"]=> string(0) ""
    //                     [10]=> string(0) "" } ;