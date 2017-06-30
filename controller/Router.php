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
require_once 'controller/HomeController.php';
require_once 'controller/AdministrationController.php';

class Router {

  private $ctrlAccueil;
  private $ctrlAdministration;


  public function __construct() {
    $this->ctrlAccueil = new HomeController();
    $this->ctrlAdministration = new AdministrationController();
  }

  public function accueil(){
      $this->ctrlAccueil->home();
  }

  public function administration() {
           $this->ctrlAdministration->administration();
  }

  // Affiche une erreur
  private function erreur($msgErreur) {
    $vue = new View("Erreur");
    $vue->generer(array('msgErreur' => $msgErreur));
  }
}