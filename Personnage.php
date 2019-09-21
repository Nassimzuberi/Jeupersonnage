<?php

class Personnage{
    private $id;
    private $nom;
    private $degats;

    public function __construct(array $donnees){
        $this->dispatch($donnees);
    }

    private function dispatch($donnees){
        foreach($donnees as $key => $val){
            $method = 'set'.ucfirst($key);
            if(method_exists($this,$method)){
                return $this->$method($val);
            }
        }
    }
    public function getId(){
        return $this->id;
    }

    public function getNom(){
        return $this->nom;
    }
    public function getDegats(){
        return $this->degats;
    }

    public function setId(){
        $this->id = $id;

    }

    public function setNom($nom){
        $this->nom = $nom;
    }
    public function setDegats($degats){
        $this->nom = $degats;
    }


    public function frapper($perso){
        $perso.recevoirDegats();
    }

    public function recevoirDegats(){
        $this->degats += 5;
        if($this->degats === 100){
            PersonnageManager::getDb()->delete($this.name);
        }
    }

    public function hydrate(){
        $this->degats -= 5;
    }
}