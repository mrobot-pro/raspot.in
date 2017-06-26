<?php

require_once 'vue/VueAdmin.php';
require_once 'controleur/Routeur.php';

class ControleurAdministration {


  // Affiche le menu admin
  public function administration() {
   $routeur=new Routeur();
    $vue = new VueAdmin("Administration");
    $vue->generer(array());
      
   
     if (isset($_GET['deconnexion'])) {

                  session_destroy();
                
                  exit();

        }elseif(isset($_GET['Appli'])) {

                $routeur->adminappli();

        }elseif(isset($_GET['Data'])) {

                $routeur->admindata();
	}
        
        
  }   
}