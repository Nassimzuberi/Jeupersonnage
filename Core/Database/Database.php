<?php

namespace Core\Database;
use \PDO;
class Database{
    private $db_name;
    private $db_host;
    private $db_user;
    private $db_pass;
    private $db;

    public function __construct($db_host,$db_name,$db_user,$db_pass){
        $this->db_host = $db_host;
        $this->db_name = $db_name;
        $this->db_user = $db_user;
        $this->db_pass = $db_pass;

    }

    public function getPDO(){

        if(is_null($this->db)){
            $this->db = new PDO('mysql:dbname='. $this->db_name . ';host='. $this->db_host , $this->db_user , $this->db_pass);
        }
        return $this->db;
    }

    public function query($statement,$one = false){
        $data =  $this->getPDO()->query($statement);
        if(
            strpos($statement, 'UPDATE') === 0 ||
            strpos($statement, 'INSERT') === 0 ||
            strpos($statement, 'DELETE') === 0
        ){
            return $data;
        }
        if($one){

            $datas = $data->fetch();
        }
        else{
            $datas = $data->fetchAll();

        }
        return $datas;
    }
}