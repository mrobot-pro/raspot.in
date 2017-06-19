<?php

require_once 'Modele/Param.php';
require_once 'Vue/Vue.php';

class ControleurAccueil {

  private $param;

  public function __construct() {
    $this->param = new Param();
  }

  // Affiche la liste de tous les billets du blog
  public function accueil() {
    $param = $this->param->getParam();
    $vue = new Vue("Accueil");
    $vue->generer(array('param' => $param));
  }
}