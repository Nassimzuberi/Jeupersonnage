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
        var_dump($return);
    }

    public function CountPersonnage(){
        $data = $this->pdo->query('SELECT * FROM personnage');
        $datas = $data->fetchAll( PDO::FETCH_CLASS);
        return $datas;

    }

    public function find($id){
       $data =  $this->pdo->query("SELECT * FROM personnage WHERE id = ". $id );
       $datas = $data->fetchAll(PDO::FETCH_CLASS);
        var_dump($datas);
    }
    public function deletePersonnage($personnage){


        return $this->pdo->query("DELETE FROM personnage WHERE id = ".$personnage->id);

    }
    public function updatePersonnage($personnage){


        $this->pdo->query("
        UPDATE personnage 
        SET degats = ". $personnage->degats ."
        WHERE id = ".$personnage->id
        );

    }

    public function setDb($db){
        $this->pdo = $db;
    }


}