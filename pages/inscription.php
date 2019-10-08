

<h1 class="text-center">Inscription</h1>

<form method="post">
    <?= $form->input('username','Pseudo'); ?>
    <?= $form->input('passeword', 'Mot de passe',['type' => 'password']); ?>
    <?= $form->submit(); ?>

</form>