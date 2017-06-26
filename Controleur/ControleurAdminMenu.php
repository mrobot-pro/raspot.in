<?php

require_once 'Vue/VueAdmin.php';

class ControleurAdminMenu {

  // Affiche la liste de tous les billets du blog
  public function adminmenu() {
   
    $vue = new VueAdmin("Administration");
    $vue->generer(array());
    
	}
}