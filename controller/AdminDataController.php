<?php 

require_once 'view/viewAdmin.php';
require_once 'model/MediaManager.php';
require_once 'model/Media.php';

class AdminDataController {

  // Affiche la liste de tous les billets du blog
  public function admindata() {
   
    $vue = new ViewAdmin("AdminData");
    $vue->generer(array());

}
        }
