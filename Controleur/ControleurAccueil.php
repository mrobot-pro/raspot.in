<?php

require_once 'Modele/Media.php';
require_once 'Vue/Vue.php';

class ControleurAccueil {


  // Affiche la liste de tous les billets du blog
  public function accueil() {
 echo 'fonction accueil de controleir accueil';
    $vue = new vueAcc;
    //$vue->generer();
  }
}