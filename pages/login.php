
<h1 class="text-center">Connexion</h1>
<form method="post">
    <?= $form->input('username','Pseudo'); ?>
    <?= $form->input('password', 'Mot de passe',['type' => 'password']); ?>
    <?= $form->submit(); ?>

</form>