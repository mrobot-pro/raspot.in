<?php

require_once 'vue/Vue.php';
require_once 'modele/Parametres.php';
require_once 'controleur/ControleurAdministration.php';

class ControleurConnexion {
   

  public function connexion() {
      $parametres = new Parametres();
     
    $vue = new Vue("Connexion");
    $vue->generer(array());
    
  
    if(isset($_POST['connexion'])) {
        
      if(password_verify($_POST['mdp'],$parametres->getMdp()))
        {
          $_SESSION['login'] = 'admin'; 
          header('location:adm.php');
        }
        else
        {
          echo '<h2 class="text-center">Mauvais mot de passe !</h2>'; 
        }
    }
    }
}
