<?php


define('ROOT',dirname(__DIR__));
require ROOT . '/App/App.class.php';

$app = \App\App::getInstance();
$app::load();
if(isset($_GET['p'])){
    $page = $_GET['p'];

} else{
    $page = 'login';
}

if($page === 'login') {
    $controller = new \App\Controller\UserController();
    $controller->login();
}elseif($page === 'inscription') {
    $controller = new \App\Controller\UserController();
    $controller->inscription();
}elseif($page === 'deconnexion') {
    $controller = new \App\Controller\UserController();
    $controller->deconnexion();
}
elseif($page === 'home'){
    $controller = new \App\Controller\PersonnageController();
    $controller->choisir();
}
elseif($page === 'aventure'){
    $controller = new \App\Controller\PersonnageController();
    $controller->aventure();
}elseif($page === 'attaque'){
    $controller = new \App\Controller\PersonnageController();
    $controller->attaque();
}


?>


