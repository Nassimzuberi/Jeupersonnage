<?php
class Personnage{
    private $id;
    private $nom;
    private $degats;

    public function __construct(array $donnees){
        $this->dispatch($donnees);
    }

    private function dispatch(array $donnees){
        foreach($donnees as $key => $val){
            $method = 'set'.ucfirst($key);
            if(method_exists($this,$method)){
                $this->$method($val);
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

    public function setId($id){
        $this->id = $id;

    }

    public function setNom($nom){
        if (is_string($nom))
        {
            $this->nom = $nom;
        }
    }
    public function setDegats($degats){
        $degats = (int) $degats;

        if ($degats >= 0 && $degats <= 100)
        {
            $this->degats = $degats;
        }
    }


    public function frapper($perso){
        $perso->recevoirDegats();
    }

    public function recevoirDegats(){
        $this->degats += 5;
        if($this->degats === 100){
            echo 'Le personnage est mort';
        }
    }

    public function hydrate(){
        $this->degats -= 5;
    }
}