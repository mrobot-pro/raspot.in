<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Routeur
 *
 * @author Olivier
 */
require_once 'controleur/ControleurAccueil.php';
require_once 'controleur/ControleurAdministration.php';

class Routeur {

  private $ctrlAccueil;
  private $ctrlAdministration;


  public function __construct() {
    $this->ctrlAccueil = new ControleurAccueil();
    $this->ctrlAdministration = new ControleurAdministration();
  }

  public function accueil(){
      $this->ctrlAccueil->accueil();
  }

  public function administration() {
           $this->ctrlAdministration->administration();
  }

  // Affiche une erreur
  private function erreur($msgErreur) {
    $vue = new Vue("Erreur");
    $vue->generer(array('msgErreur' => $msgErreur));
  }
}