<?php

namespace Core\Table;

class Table{
    private $pdo;
    protected $table;
    protected $class_name;

    public function __construct($pdo){
        $this->setDb($pdo);
    }
    public function getDb(){
        return $this->pdo;
    }
    public function setDb($db){
        $this->pdo = $db;
    }

    public function all(){
        $data = $this->getDb()->query('SELECT * FROM ' . $this->table);
        return $data;
    }

    public function find($id){
        $data =  $this->getDb()->query("SELECT * FROM ". $this->table . " WHERE id = ". $id , true);
        if(is_null($data)){
            return false;
        }
        return new $this->class_name($data);
    }

    public function delete($class){


        return $this->getDb()->query("DELETE FROM ". $this->table . " WHERE id = ".$class->getId());

    }
    public function allWithout($id){
        $data = $this->getDb()->query("SELECT * FROM ". $this->table . " WHERE id <> ". $id);
        return $data;
    }

}