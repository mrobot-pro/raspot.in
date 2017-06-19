<?php

require_once 'Modele/Parametres.php';
require_once 'Vue/Vue.php';

class ControleurParametres {

  private $media;

  public function __construct() {
    $this->media = new Media();
  }

  // Affiche la liste de tous les billets du blog
  public function parametres() {
    $medias = $this->media->getMedias();
    $vue = new Vue("Medias");
    $vue->generer(array('medias' => $medias));
  }
}