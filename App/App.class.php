<?php
namespace App;
use Core\Database\Database;
class App{
    private $db;
    private static $_instance;

    public static function getInstance(){
        if(is_null(self::$_instance)){
            self::$_instance = new App();
        }
        return self::$_instance;
    }

    public function getDb(){
        $config = require(ROOT . '/config/config.php');
        if(is_null($this->db)){
            $db = new Database($config['db_host'] , $config['db_name'],$config['db_user'] ,$config['db_pass']);
            $this->db = $db;
        }
        return $this->db;
    }

    public static function load(){
        session_start();
        require ROOT . '/App/Autoloader.php';
        Autoloader::register();
    }

    public function getTable($table){
        $return = '\App\Table\\' . ucfirst($table) . 'Table';
        return new $return($this->getDb());
    }
}