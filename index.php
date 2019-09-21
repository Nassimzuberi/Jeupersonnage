<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 19/09/2019
 * Time: 12:26
 */
require('PersonnageManager.php');
$db = new PDO('mysql:dbname=jeupersonnage;dbhost=localhost', 'root','');
$manager = new PersonnageManager($db);


define('ROOT',dirname(__DIR__));




ob_start();

if(isset($_GET['p'])){
    $page = $_GET['p'];

} else{
    $page = 'home';
}


if($page === 'home') {
    require('home.php');
}elseif($page === 'aventure'){
    require('aventure.php');
}elseif($page === 'aventure.attaque'){
    require('attaque.php');
}
$content = ob_get_clean();
require('default.php');

?>


