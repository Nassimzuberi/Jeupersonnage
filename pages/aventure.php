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
<div class="card mb-3">

    <div class="card-body">
        <h2 class="card-title"><?= $personnage->getNom() ; ?></h2>
        <div class="progress">
            <div class="progress-bar bg-success" role="progressbar" style="width: <?= 100 - $personnage->getDegats(); ?>%;" aria-valuemax="100"><?= 100 - $personnage->getDegats(); ?> HP</div>
        </div>

    </div>
</div>
<div class="text-center ">
    <button class="btn btn-warning" type="button" data-target="#collapseAttaque" data-toggle="collapse" aria-controls="collapseAttaque">
        <h1>Attaquer</h1>
    </button>
    <button class="btn btn-success ml-3" type="button">
        <h1>S'hydrater</h1>
    </button>
    <div class="collapse" id="collapseAttaque">
        <?php foreach($personnages as $personnage) : ?>

            <div class="card text-center" style="width: 18rem;display:inline-block">
                <div class="card-body">
                    <div class="card-title">
                        <?= $personnage{'nom'} ?> - <small><?= 100 - $personnage['degats'] ?> HP</small>
                    </div>
                </div>
                <div class="card-footer">
                    <form method="post" action="../public/index.php?p=aventure.attaque&id=<?= $_GET['id']; ?>">
                        <input type="hidden" name="id_attaque" value="<?= $personnage['id']; ?>">
                        <button class="btn btn-danger" type="submit" >Attaquer</button>
                    </form>
                </div>
            </div>

        <?php endforeach; ?>
    </div>
</div>

<div class="row mt-3">

    <div class="col">
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
    <div class="col">
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
</div>

