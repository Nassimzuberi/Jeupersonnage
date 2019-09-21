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
$personnages = $manager->CountPersonnage();

?>

<div>

    <div >
        <?php foreach($personnages as $personnage) : ?>

        <div > <?= $personnage->nom ?>
            <?= 100 - $personnage->degats ?>
            <button type="button" name="choisir">Choisir</button>
        </div>

        <?php endforeach; ?>


    </div>
    <form method="get" action="">
        <label>Nom du personnage</label>
        <input type="text" name="nom" >
        <button type="submit" name="creation">Création</button>

    </form>


</div>

<?php
if(isset($_GET["creation"])){

    $perso = new Personnage(["nom" => $_GET["nom"] ]);
   $manager->addPersonnage($perso);
   header("location:index.php?id=" . $perso->getId() );
}
if(isset($_GET["choisir"])){
    header('location:?');
}