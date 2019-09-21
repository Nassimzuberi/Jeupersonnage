<?php
$personnages = $manager->ListPersonnage();
?>
<h1 class="mb-3">Choisir un combattant</h1>

<div class="card-group">
        <?php foreach($personnages as $personnage) : ?>
        <div class="card">
            <div class="card-body text-center">
                <h5 class="card-title"><?= $personnage{'nom'} ?> - <small><?= 100 - $personnage['degats'] ?> HP</small></h5>


            </div>
            <div class="card-footer text-center">
                <a class="btn btn-primary" href="index.php?p=aventure&id=<?= $personnage['id']; ?>">Choisir</a>

            </div>
        </div>
        <?php endforeach; ?>

</div>


    <form method="post" action="" style="margin-left: 15px;"><legend>Créer un nouveau perso ?</legend>
        <label>Nom du personnage</label>
        <input type="text" name="nom" >
        <button class="btn btn-success" type="submit" name="creation">Création</button>

    </form>


<?php
if(isset($_POST["creation"])){
    if($_POST["nom"]){
        $perso = new Personnage(["nom" => $_POST["nom"] ]);
        $manager->addPersonnage($perso);
        header('location:');
    }
    else{
        echo "<div class='alert alert-danger' > Vous n'avez pas renseigné de nom </div>";
    }
}

?>