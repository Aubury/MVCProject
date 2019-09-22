<?php


class Db
{
    private $servername, $username, $password, $dbname, $opt;
    public $con;
    public function __construct()
    {
        $this->servername = "localhost";
        $this->username = "newprojectDB";
        $this->password = "0_newprojectDB";
        $this->dbname = "aubury";


     try{
        $this->con = new PDO("mysql:host=$this->servername;dbname=$this->dbname", $this->username, $this->password );
//        // set the PDO error mode to exception
       $this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     }

      catch(PDOException $e)
      {

        echo($e->getMessage());
        file_put_contents('DBErrors.txt', $e->getMessage(), FILE_APPEND);
      }


    }
}