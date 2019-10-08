<?php


if($personnage->frapper($victime)){
    ?>
    <h1> Vous avez frapper <?= $victime->getNom(); ?></h1>
<?php
}
?>



