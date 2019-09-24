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
    protected $table = "users" ;
    protected $class_name = "App\Entity\Users";


    public function inscrire($username,$password){
        $passeword = sha1($password);
        $data = $this->getDb()->query("INSERT INTO users(username,passeword)
VALUES ('". $username . "','" . $passeword . "') ;"
        );
        return $data;
    }
    public function countPersonnage($id){
        $data = $this->getDb()->query("SELECT count(id) from personnage WHERE id_user =" . $id);
        return $data;
    }
}