<?php
namespace Core\Auth;
use Core\Database\Database;
use App\App;
class DbAuth{
    private $db;
    public function __construct(Database $db){
        $this->db = $db;
    }

    public function getUserId(){
        if($this->logged()){

            return $_SESSION['auth'];
        }
        return false;
    }

    /**
     * @param $username
     * @param $password
     * @return boolean
     */
    public function login($username, $password){
        $user = $this->db->query('SELECT * FROM users WHERE username = "' . $username . '"' ,true);
        if($user){
            if( $user['passeword'] === sha1($password)){
                   $_SESSION['auth'] = $user['id'];
                   return true;
            }
        }
        return false;
    }

    public function loginPersonnage($id){
        $personnage = App::getInstance()->getTable('Personnage')->find($id);
        $_SESSION['personnage'] = $personnage->getId();
        return $_SESSION['personnage'];
    }

    public function changerPersonnage(){
        if(isset($_SESSION['personnage'])){
            unset($_SESSION['personnage']);
        }else{
            return false;
        }

    }
    public function deconnexion(){
        session_destroy();
    }

    public function logged(){
        return isset($_SESSION['auth']);
}
}