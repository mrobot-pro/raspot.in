<?php

require_once 'Modele/Parametres.php';
require_once 'Vue/Vue.php';

class ControleurAccueil {

  private $parametres;

  public function __construct() {
    $this->parametres = new Parametres();
  }

  // Affiche la liste de tous les billets du blog
  public function accueil() {
    $parametres = $this->parametres->getParametres();
  
    $vue = new Vue("Accueil");
    $vue->generer(array($parametres));
  }
}