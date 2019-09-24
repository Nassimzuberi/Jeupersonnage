<?php
namespace App\Entity;
use Core\Entity\Entity;
use App\App;
class Personnage extends Entity {
    private $id;
    private $nom;
    private $degats;
    private $pills;
    private $potion;
    private $id_user;


    public function getId(){
        return $this->id;
    }
    public function getId_user(){
        return $this->id_user;
    }

    public function getNom(){
        return $this->nom;
    }
    public function getDegats(){
        return $this->degats;
    }
    public function getPills(){
        return $this->pills;
    }

    public function getPotions(){
        return $this->potion;
    }


    public function setId($id)
    {
        $this->id = $id;
    }


    public function setId_user($id){
        $this->id_user = $id;

    }

    public function setNom($nom){
        if (is_string($nom))
        {
            $this->nom = $nom;
        }
    }
    public function setPills($pills){

            $this->pills = $pills;

    }
    public function setPotion($potion){

            $this->potion = $potion;

    }
    public function setDegats($degats){
        $degats = (int) $degats;

        if ($degats >= 0 && $degats <= 100)
        {
            $this->degats = $degats;
        }
    }


    public function frapper($perso){
        if($this->pills == 0){
            echo "<div class='alert alert-danger'> Vous n'avez plus de pilules <br> Vous ne pouvez plus attaquer</div>";
            return false;
        }else{
            $perso->recevoirDegats();
            App::getInstance()->getTable('Attaque')->addAttaque($this->getId(), $perso->getId());
            $this->pills -= 1;
            App::getInstance()->getTable('Personnage')->update($this);
            return true;
        }

    }

    public function recevoirDegats(){
        $this->degats += 5;
        App::getInstance()->getTable('Personnage')->update($this);
        if($this->degats >= 100){
            echo 'Vous avez tué le personnage';
            App::getInstance()->getTable('Personnage')->delete($this);
        }
    }

    public function hydrate(){
        if($this->degats > 0 && $this->potion > 0){
            $this->degats -= 5;
            $this->potion -=1;
            App::getInstance()->getTable('Personnage')->update($this);
        }elseif($this->getDegats() == 0){
            echo "<div class='alert alert-danger' > Vos HP sont au max </div>";
        }elseif($this->potion == 0){
            echo "<div class='alert alert-danger' > Vous n'avez plus de potion </div>";
        }
    }
}