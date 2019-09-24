<?php
if(!empty($_POST)){

    if(App\App::getInstance()->getTable('Users')->inscrire($_POST['username'],$_POST['password'])){
        ?>
        <div class="alert alert-success">
            Votre compte a bien été créer
        </div>

<?php
    }else{ ?>

        <div class="alert alert-danger">
        Il y a une erreur
        </div>
<?php
    }
}

$form = new \Core\Form\BootstrapForm($_POST);

?>

<h1 class="text-center">Inscription</h1>

<form method="post">
    <?= $form->input('username','Pseudo'); ?>
    <?= $form->input('password', 'Mot de passe',['type' => 'password']); ?>
    <?= $form->submit(); ?>

</form>