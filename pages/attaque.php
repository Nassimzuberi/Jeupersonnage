<?php
/**
 * Created by PhpStorm.
 * User: nassi
 * Date: 21/09/2019
 * Time: 17:42
 */

$data = $manager->find($_GET['id']);
$personnage = $manager->find($_GET['id']);
$victime =$manager->find($_POST['id_attaque']);
$personnage->frapper($victime);

$query = $manager->getDb()->query("
INSERT INTO attaque(id_attaquant,id_victime,time_attaque) VALUES (" . $_GET['id'] .  ","  . $_POST['id_attaque'] .",'" . date("Y-m-d H:i:s") . "')
"

);
$manager->updatePersonnage($victime);
header("Refresh: 2;url=index.php?p=aventure&id=". $personnage->getId());
?>

<h1> Vous avez frapper <?= $victime->getNom(); ?></h1>

<a href="../public/index.php?p=aventure&id=<?= $personnage->getId(); ?>">Retour</a>
