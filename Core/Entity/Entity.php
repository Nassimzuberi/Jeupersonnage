<?php
namespace Core\Entity;

class Entity{


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
}