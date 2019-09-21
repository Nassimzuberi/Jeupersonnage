<?php
require('Personnage.php');
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 19/09/2019
 * Time: 12:10
 */
class PersonnageManager{
    private $pdo;


    public function __construct($pdo){
        $this->setDb($pdo);
    }

    public function addPersonnage($personnage){

        $return = $this->pdo->query('
INSERT INTO personnage(nom) 
VALUES ("'. $personnage->getNom() . '") ;'
        );
    }

    public function ListPersonnage(){
        $data = $this->pdo->query('SELECT * FROM personnage');
        $datas = $data->fetchAll();
        return $datas;
    }
    public function PersonnageAttaque($id){
        $data = $this->pdo->query('SELECT * FROM personnage WHERE id <>'. $id);
        $datas = $data->fetchAll();
        return $datas;
    }

    public function exist($id){
        $perso = $this->find($id);
        if(!$perso){
            return false;
        }else{
            return true;
        }
    }
    public function find($id){
       $data =  $this->pdo->query("SELECT * FROM personnage WHERE id = ". $id );
       $datas = $data->fetch();
        return new Personnage($datas);
    }
    public function deletePersonnage($personnage){


        return $this->pdo->query("DELETE FROM personnage WHERE id = ".$personnage->getId);

    }
    public function updatePersonnage($personnage){


        $this->pdo->query("
        UPDATE personnage 
        SET degats = ". $personnage->getDegats() ."
        WHERE id = ".$personnage->getId()
        );

    }

    public function ListDegats($id){
    $data = $this->pdo->query('SELECT * FROM attaque WHERE id_victime = '. $id);
    $datas = $data->fetchAll();
    return $datas;
}
    public function ListAttaque($id){
        $data = $this->pdo->query('SELECT * FROM attaque WHERE id_attaquant = '. $id);
        $datas = $data->fetchAll();
        return $datas;
    }
    public function getDb(){
        return $this->pdo;
    }
    public function setDb($db){
        $this->pdo = $db;
    }


}