<?php

namespace App\Controller;


use App\App;

class UserController extends AppController
{
    public function login()
    {
        if (!empty($_POST)) {
            $auth = new \Core\Auth\DbAuth();
            if ($auth->login($_POST['username'], $_POST['password'])) {
                header('location:?p=home');
            } else {
                ?>
                <div class="alert alert-danger">
                    Identifiants incorrect
                </div>
                <?php
            }
        }
        $form = new \Core\Form\BootstrapForm($_POST);
        $this->render('login', compact('form'));

    }

    public function inscription()
    {
        if (!empty($_POST)) {

            if (App::getInstance()->getTable('Users')->inscrire($_POST)) {
                ?>
                <div class="alert alert-success">
                    Votre compte a bien été créé
                </div>

                <?php
            } else { ?>

                <div class="alert alert-danger">
                    Il y a une erreur
                </div>
                <?php
            }
        }

        $form = new \Core\Form\BootstrapForm($_POST);
        $this->render('inscription',compact('form'));
    }

    public function deconnexion(){
        $auth = new \Core\Auth\DbAuth();
        $auth->deconnexion();
        header('location: index.php');
        }
}

