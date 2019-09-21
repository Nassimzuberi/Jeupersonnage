<?php
$personnages = $manager->ListPersonnage();
?>
<h1 class="mb-3">Choisir un combattant</h1>

        <?php foreach($personnages as $personnage) : ?>
        <div class="card  text-center" style="width: 18rem;display:inline-block">
            <div class="card-body">
                <h5 class="card-title"><?= $personnage{'nom'} ?> - <small><?= 100 - $personnage['degats'] ?> HP</small></h5>


            </div>
            <div class="card-footer">
                <a class="btn btn-primary" href="?p=aventure&id=<?= $personnage['id']; ?>">Choisir</a>

            </div>
        </div>
        <?php endforeach; ?>



    <form method="post" action="" style="margin-left: 15px;"><legend>Créer un nouveau perso ?</legend>
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
            $perso = new App\Entity\Personnage(["nom" => $_POST["nom"] ]);
            $manager->addPersonnage($perso);
            header('refresh:0');
        }
    }
    else{
        echo "<div class='alert alert-danger' > Vous n'avez pas renseigné de nom </div>";
    }
}

?>