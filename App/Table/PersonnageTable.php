<?php
namespace App\Table;
use App\Entity\Personnage;
use Core\Table\Table;


class PersonnageTable extends Table {


    public function addPersonnage($personnage){
        $this->getDb()->query('
INSERT INTO personnage(nom,id_user) 
VALUES ("'. $personnage->getNom() . '" ,'. $personnage->getId_user() . ') ;'
        );
    }


    public function find($id){
        $data =  $this->getDb()->query("SELECT * FROM ". $this->table . " WHERE id = ". $id , true);
        if(!$data){
            return new Personnage(['nom' => '(Combattant mort)']);
        }
        return new $this->class_name($data);
    }

    public function exist($nom){
        $perso = $this->getDb()->query("SELECT * FROM personnage WHERE nom = '" . $nom . "'", true);
        if($perso){
            return true;
        }else{
            return false;
        }
    }

    public function allByUser($id){
        $data = $this->getDb()->query('SELECT * FROM ' . $this->table .' WHERE id_user = ' . $id);
        return $data;
    }
    public function allWithoutUser($id){
        $data = $this->getDb()->query("SELECT * FROM ". $this->table . " WHERE id_user <> ". $id);
        return $data;
    }

    public function update($personnage){


        $this->getDb()->query("
        UPDATE personnage 
        SET degats = ". $personnage->getDegats() ."
        , pills = ". $personnage->getPills() . "
        WHERE id = ".$personnage->getId()
        );

    }



}