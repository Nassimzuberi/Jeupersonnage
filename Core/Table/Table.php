<?php

namespace Core\Table;

class Table{
    private $pdo;
    protected $table;
    protected $class_name;


    public function __construct($pdo){
        $this->setDb($pdo);
        $this->setTableAndClass();

    }
    public function getDb(){
        return $this->pdo;
    }
    public function setDb($db){
        $this->pdo = $db;
    }
    public function setTableAndClass(){
        $table = explode('\\', get_class($this));
        $this->table = strtolower(str_replace('Table', '' ,end($table)));
        $this->class_name = 'App\Entity\\' . ucfirst($this->table);
    }

    public function create(array $donnees)
    {
        $champ = [];
        $ky = '';
        $keys = array_keys($donnees);
        $last_key = end($keys);
        foreach ($donnees as $k => $val) {
            $champ[] = $k;
            if ($k === $last_key) {
                $ky .= ':'. $k;
            } else {
                $ky .= ':'.$k.' , ';
            }
        }
        $query = "INSERT INTO {$this->table} (" . implode(',',$champ) . ") values (  $ky ) ";
        $data = $this->getDb()->prepare($query,$donnees);
        return $data;

    }

    public function all(){
        $data = $this->getDb()->query("SELECT * FROM  {$this->table}");
        return $data;
    }

    public function find($id){
        $data =  $this->getDb()->query("SELECT * FROM {$this->table} WHERE id = {$id}", true);
        if(is_null($data)){
            return false;
        }
        return new $this->class_name($data);
    }

    public function delete($class){


        return $this->getDb()->query("DELETE FROM {$this->table} WHERE id = {$class->getId()}");

    }
    public function allWithout($id){
        $data = $this->getDb()->query("SELECT * FROM ". $this->table . " WHERE id <> {$id}");
        return $data;
    }
    /**
     * @return string
     */
    public function getClassName()
    {
        return $this->class_name;
    }

    /**
     * @param string $class_name
     */
    public function setClassName($class_name)
    {
        $this->class_name = $class_name;
    }


}