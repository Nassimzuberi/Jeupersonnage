<?php

define('ROOT',dirname(__DIR__));
require ROOT . '/App/App.class.php';

$app = \App\App::getInstance();
$app::load();
$manager = $app->getTable('Personnage');
$atk = $app->getTable('Attaque');
$auth = new Core\Auth\DbAuth($app->getDb());
ob_start();
if(isset($_GET['p'])){
    $page = $_GET['p'];

} else{
    $page = 'home';
}

if($page === 'home') {
    require(ROOT . '/pages/login.php');
}
elseif($page === 'choisir'){
    require(ROOT . '/pages/home.php');
}
elseif($page === 'aventure'){
    require(ROOT . '/pages/aventure.php');
}elseif($page === 'aventure.attaque'){
    require(ROOT . '/pages/attaque.php');
}
elseif($page === 'deconnexion') {
    require(ROOT . '/pages/deconnexion.php');
}elseif($page === 'inscription') {
    require(ROOT . '/pages/inscription.php');
}
$content = ob_get_clean();
require(ROOT . '/pages/templates/default.php');

?>


