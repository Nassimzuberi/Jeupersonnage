<?php


namespace App\Controller;

use App\App;
use App\Entity\Personnage;
use Core\Auth\DbAuth;

class PersonnageController extends AppController{

    public function choisir(){
        $auth = new DbAuth();
        $auth->changerPersonnage();
        $manager = App::getInstance()->getTable('Personnage');
        $personnages = $manager->allByUser($auth->getUserId());
        $user = App::getInstance()->getTable('Users')->find($_SESSION['auth']);
        if(isset($_POST["creation"])){
            if($_POST["nom"]){
                if($manager->exist($_POST["nom"])){
                    echo "<div class='alert alert-danger' > Ce nom est deja pris ! </div>";
                }else{
                    if($user->getMax_slot() > App::getInstance()->getTable('Users')->countPersonnage($_SESSION['auth'])){
                        $perso = new Personnage(["nom" => $_POST["nom"] , "id_user" => $auth->getUserId()]);
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
        $this->render('home', compact('personnages','user'));
    }
    public function aventure(){
        $auth = new DbAuth();
        $manager = App::getInstance()->getTable('Personnage');
        $atk= App::getInstance()->getTable('Attaque');

        if(isset($_SESSION['personnage'])){
            $personnage = $manager->find($_SESSION['personnage']);
        }else{
            $id = $auth->loginPersonnage($_POST['id']);
            $personnage = $manager->find($id);
        }
        $personnages = $manager->allWithoutUser($auth->getUserId());
        $degats = $atk->allDegats($personnage->getId());
        $attaques = $atk->allAttaque($personnage->getId());

        if(isset($_POST['hydratation'])){
            $personnage->hydrate();
        }
        $this->render('aventure',compact('personnage','personnages', 'degats', 'attaques','manager'));

    }

    public function attaque(){
        $manager = App::getInstance()->getTable('Personnage');

        $id_personnage = $_SESSION['personnage'];
        $personnage = $manager->find($id_personnage);
        $victime =$manager->find($_POST['id_attaque']);

        $this->render('attaque',compact('personnage','victime'));
        header("Refresh: 2;url=index.php?p=aventure");
    }

}