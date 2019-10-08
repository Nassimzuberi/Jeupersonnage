<?php
/**
 * Created by PhpStorm.
 * Users: nassi
 * Date: 31/08/2019
 * Time: 18:28
 */
namespace App\Table;
use \Core\Table\Table;

class UsersTable extends Table
{


    public function inscrire($array){
        $array['passeword'] = sha1($array['passeword']);
        $data = $this->create($array);
        return $data;
    }
    public function countPersonnage($id){
        $data = $this->getDb()->query("SELECT count(*) from personnage WHERE id_user = {$id}", true);
        return $data[0];
    }
}