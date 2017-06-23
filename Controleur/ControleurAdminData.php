<?php 

require_once 'vue/VueAdmin.php';
require_once 'modele/MediaManager.php';
require_once 'modele/Media.php';

class ControleurAdminData {

  // Affiche la liste de tous les billets du blog
  public function admindata() {
   
    $vue = new VueAdmin("AdminData");
    $vue->generer(array());

}
        }
