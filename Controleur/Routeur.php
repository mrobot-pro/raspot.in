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
//require_once 'Controleur/ControleurMedia.php';
require_once 'Controleur/ControleurMedia.php';
require_once 'Vue/Vue.php';

class Routeur {

  private $ctrlMedia;
  //private $ctrlAccueil;

  public function __construct() {
    $this->ctrlMedia = new ControleurMedia();
    //$this->ctrlAccueil = new ControleurAccueil();
  }

  // Traite une requête entrante
  public function routerRequete() {
    try {
      /*if (isset($_GET['action'])) {
        if ($_GET['action'] == 'billet') {
          if (isset($_GET['id'])) {
            $idBillet = intval($_GET['id']);
            if ($idBillet != 0) {
              $this->ctrlBillet->billet($idBillet);
            }
            else
              throw new Exception("Identifiant de billet non valide");
          }
          else
            throw new Exception("Identifiant de billet non défini");
        }
        else
          throw new Exception("Action non valide");
      }
      else {  // aucune action définie : affichage de l'accueil*/
        $this->ctrlMedia->accueil();
     // }
    }
    catch (Exception $e) {
      $this->erreur($e->getMessage());
    }
  }

  // Affiche une erreur
  private function erreur($msgErreur) {
    $vue = new Vue("Erreur");
    $vue->generer(array('msgErreur' => $msgErreur));
  }
}