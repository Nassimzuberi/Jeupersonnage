<?php
/**
 * Created by PhpStorm.
 * Users: nassi
 * Date: 21/09/2019
 * Time: 17:42
 */
$id_personnage = $_SESSION['personnage'];
$personnage = $manager->find($id_personnage);
$victime =$manager->find($_POST['id_attaque']);

header("Refresh: 2;url=index.php?p=aventure");
if($personnage->frapper($victime)){
    ?>
    <h1> Vous avez frapper <?= $victime->getNom(); ?></h1>
<?php
}
?>



