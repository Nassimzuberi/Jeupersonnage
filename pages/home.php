<?php
$auth->changerPersonnage();
$personnages = $manager->allByUser($auth->getUserId());
$user = $app->getTable('Users')->find($_SESSION['auth']);
?>
<h1 class="mb-3">Choisir un combattant</h1>

        <?php foreach($personnages as $personnage) : ?>
        <div class="card  text-center" style="width: 18rem;display:inline-block">
            <div class="card-body">
                <h5 class="card-title"><?= $personnage{'nom'} ?> - <small><?= 100 - $personnage['degats'] ?> HP</small></h5>
                <p><?= $personnage['pills'] ?> pills </p>
                <p><?= $personnage['potion'] ?> potions </p>
            </div>
            <div class="card-footer">
                <div class="btn-group">
                <form method="post" action="?p=aventure">
                    <input type="hidden" name="id" value="<?= $personnage['id'] ; ?>">
                    <button type="submit" class="btn btn-primary" >Choisir</button>
                </form>
                <form method="post" class="ml-3">
                    <input type="hidden" name="id" value="<?= $personnage['id'] ; ?>">
                    <button type="submit" class="btn btn-warning" name="supprimer">Supprimer</button>
                </form>
                </div>
            </div>
        </div>
        <?php endforeach; ?>



    <form method="post" action="" style="margin-left: 15px;"><legend>Créer un nouveau perso ? <small> Vous avez <?= $user->getMax_slot() ?> slot max</small></legend>
        <label>Nom du personnage</label>
        <input type="text" name="nom" >
        <button class="btn btn-success" type="submit" name="creation">Création</button>

    </form>


<?php
if(isset($_POST["creation"])){
    if($_POST["nom"]){
        if($manager->exist($_POST["nom"])){
            echo "<div class='alert alert-danger' > Ce nom est deja pris ! </div>";
        }else{
            if($user->getMax_slot() > $app->getTable('Users')->countPersonnage($_SESSION['auth'])){
                $perso = new App\Entity\Personnage(["nom" => $_POST["nom"] , "id_user" => $auth->getUserId()]);
                $manager->addPersonnage($perso);
                header('refresh:0');
            }else{
                echo "<div class='alert alert-danger' > Vous n'avez plus de slot libre </div>";

            }

        }
    }
    else{
        echo "<div class='alert alert-danger' > Vous n'avez pas renseigné de nom </div>";
    }
}

if(isset($_POST["supprimer"])){
    $person = $manager->find($_POST['id']);
    $manager->delete($person);
    header('refresh:0');
}


?>