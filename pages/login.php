<?php

if(!empty($_POST)){
    $auth = new \Core\Auth\DbAuth(App\App::getInstance()->getDb());
    if($auth->login($_POST['username'],$_POST['password'])){
        header('location:?p=choisir');
    }else{
        ?>
<div class="alert alert-danger">
    Identifiants incorrect
</div>
<?php
    }
}
$form = new \Core\Form\BootstrapForm($_POST);

?>
<h1 class="text-center">Connexion</h1>
<form method="post">
    <?= $form->input('username','Pseudo'); ?>
    <?= $form->input('password', 'Mot de passe',['type' => 'password']); ?>
    <?= $form->submit(); ?>

</form>