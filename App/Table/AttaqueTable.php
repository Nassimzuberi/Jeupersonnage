<?php

namespace App\Table;

use Core\Table\Table;

class AttaqueTable extends Table {
    protected $table = "attaque";
    protected $class_name = "App\Entity\Attaque";


    public function allDegats($id){
        $data = $this->getDb()->query('SELECT * FROM attaque WHERE id_victime = '. $id);
        return $data;
    }
    public function allAttaque($id){
        $data = $this->getDb()->query('SELECT * FROM attaque WHERE id_attaquant = '. $id);
        return $data;
    }

    public function addAttaque($id_attaquant,$id_victime){
        $data = $this->getDb()->query("
INSERT INTO attaque(id_attaquant,id_victime,time_attaque) VALUES (" . $id_attaquant .  ","  . $id_victime .",'" . date("Y-m-d H:i:s") . "')");

    }
}