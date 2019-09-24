<?php
/**
 * Created by PhpStorm.
 * Users: nassi
 * Date: 22/09/2019
 * Time: 11:02
 */

namespace App\Entity;


class Attaque
{
    private $id;
    private $id_attaquant;
    private $id_victime;
    private $time_attaque;

    public function getId(){
        return $this->id;
    }
    public function getId_attaquant(){
        return $this->id_attaquant;
    }
    public function getId_victime(){
        return $this->id_victime;
    }
    public function getTime_attaque(){
        return $this->time_attaque;
    }


    public function setId($id){
        $this->id = $id;
    }
    public function setId_attaquant($id){
        $this->id_attaquant = $id;
    }
    public function setId_victime($id){
        $this->id_victime = $id;
    }
    public function setTime_attaque($id){
        $this->time_attaque = $id;
    }
}