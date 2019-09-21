<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 19/09/2019
 * Time: 12:31
 */
$personnage = $manager->find($_GET['id']);
$personnages = $manager->PersonnageAttaque($_GET['id']);
$degats = $manager->ListDegats($_GET['id']);
$attaques = $manager->ListAttaque($_GET['id']);

?>


<h1>Attaquez un ennemi</h1>
<div class="card-group">
    <?php foreach($personnages as $personnage) : ?>

        <div class="card">
            <div class="card-body">
                <div class="card-title">
                    <?= $personnage{'nom'} ?> - <small><?= 100 - $personnage['degats'] ?> HP</small>
                </div>

                <form method="post" action="index.php?p=aventure.attaque&id=<?= $_GET['id']; ?>">
                    <input type="hidden" name="id_attaque" value="<?= $personnage['id']; ?>">
                    <button class="btn btn-danger" type="submit" >Attaquer</button>
                </form>
            </div>
        </div>

    <?php endforeach; ?>

</div>

<div>
    <h1>Historique des dégats subies</h1>

    <?php
    if($degats){
    foreach($degats as $attaque) :
    $attaquant = $manager->find($attaque['id_attaquant']);
    ?>

    <p>Vous avez été attaqué par <?= $attaquant->getNom() ?> - <?= $attaque['time_attaque']; ?></p>
    <?php endforeach ;
    }
    else{
        echo "<p>Aucun dégats subis</p>";
    } ?>
</div>
<div>
    <h1>Historique des attaques</h1>

    <?php
    if($attaques){
        foreach($attaques as $attaque) :
            $attaquant = $manager->find($attaque['id_victime']);
            ?>

            <p>Vous avez attaqué  <?= $attaquant->getNom() ?> - <?= $attaque['time_attaque'] ; ?></p>
        <?php endforeach ;
    }else{
        echo '<p>Vous n\'avez attaqué personne</p>';
    }
     ?>
</div>