<?php

require_once 'Modele/Parametres.php';
require_once 'Vue/Vue.php';

class ControleurParametres {

  private $parametres;

  public function __construct() {
    $this->parametres = new Parametres();
  }

  // Affiche la liste de tous les billets du blog
  public function parametres() {
    $parametres = $this->parametres->getParametres();
    $vue = new Vue("Parametres");
    $vue->generer(array('Parametres' => $parametres));
  }
}