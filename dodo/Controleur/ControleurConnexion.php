<?php

require_once 'Vue/Vue.php';
require_once 'Modele/Parametres.php';

class ControleurConnexion {

  // Affiche la liste de tous les billets du blog
  public function connexion() {
   
    $vue = new Vue("Connexion");
    $vue->generer(array());

    if(isset($_POST['ok'])) {
      $_SESSION['login'] ='admin';
      header('location:adm.php');
    }
    else {
      echo '<h2 class="text-center">Mauvais mot de passe !</h2>'; 
    }

        //appel traitement connexion avec authentification
    /*if(isset($_POST['ok']))
    {

      if(password_verify($_POST['mdp'], $dataParam['mdp']))
        {
        $_SESSION['login'] = 'admin'; 
        header('location:adm.php');
        }
        else
        {
         echo '<h2 class="text-center">Mauvais mot de passe !</h2>'; 
        } 
    }*/
    
	}
}