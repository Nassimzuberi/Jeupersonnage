<?php
/**
 * Created by PhpStorm.
 * Users: nassi
 * Date: 22/09/2019
 * Time: 14:24
 */

namespace App\Entity;


use Core\Entity\Entity;

class Users extends Entity
{
    private $id;
    private $username;
    private $passeword;
    private $max_slot;

    public function getId(){
        return $this->id;
    }

    public function getUsername(){
        return $this->username;
    }
    public function getPassword(){
        return $this->passeword;
    }
    public function getMax_slot(){
        return $this->max_slot;
    }

    public function setPassword($password){
     $this->passeword = $password;
    }


    public function setId($id){
        $this->id = $id;

    }
    public function setMax_slot($max_slot){
        $this->max_slot = $max_slot;

    }

    public function setUsername($nom){
        if (is_string($nom))
        {
            $this->username = $nom;
        }
    }

}