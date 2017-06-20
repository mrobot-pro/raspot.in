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
require_once 'Controleur/ControleurAccueil.php';
require_once 'Controleur/ControleurAccueilAdmin.php';
require_once 'Controleur/ControleurMedia.php';
require_once 'Controleur/ControleurParametres.php';
require_once 'Vue/Vue.php';

class Routeur {

  private $ctrlMedia;
  private $ctrlAccueilAdmin;
  private $ctrlParametres;
    private $ctrlAccueil;

  public function __construct() {
    $this->ctrlMedia = new ControleurMedia();
    $this->ctrlAccueilAdmin = new ControleurAccueilAdmin;
    $this->ctrlAccueil = new ControleurAccueil;
    $this->ctrlParametres = new ControleurParametres;
  }

  public function accueilAdmin() {
      $this->ctrlAccueilAdmin->accueilAdmin();      
  }
  
  public function accueil(){
      $this->ctrlAccueil->accueil();
  }
  
  public function medias(){
        $this->ctrlMedia->medias();
  }
  
   public function parametres(){
        $this->ctrlParametres->parametres();
  }
  
  public function connexion(){
  
  }

  // Affiche une erreur
  private function erreur($msgErreur) {
    $vue = new Vue("Erreur");
    $vue->generer(array('msgErreur' => $msgErreur));
  }
}