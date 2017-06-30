<?php

require_once 'view/View.php';
require_once 'model/Settings.php';
require_once 'controller/AdministrationController.php';

class ConnexionController {
   

  public function connexion() {
      $parametres = new Settings();
     
    $vue = new View("Connexion");
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
