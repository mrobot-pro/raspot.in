<?php

require_once 'view/viewAdmin.php';

class AdminMenuController {

  // Affiche la liste de tous les billets du blog
  public function adminmenu() {
   
    $vue = new viewAdmin("Administration");
    $vue->generer(array());
    
	}
}