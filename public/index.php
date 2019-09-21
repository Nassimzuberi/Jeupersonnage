<?php

define('ROOT',dirname(__DIR__));
require ROOT . '/App/App.class.php';

$app = \App\App::getInstance();
$app::load();
$db = $app->getDb();
$manager = new App\Table\PersonnageManager($db);
ob_start();

if(isset($_GET['p'])){
    $page = $_GET['p'];

} else{
    $page = 'home';
}


if($page === 'home') {
    require(ROOT . '/pages/home.php');
}elseif($page === 'aventure'){
    require(ROOT . '/pages/aventure.php');
}elseif($page === 'aventure.attaque'){
    require(ROOT . '/pages/attaque.php');
}
$content = ob_get_clean();
require(ROOT . '/pages/templates/default.php');

?>


