<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Parametres
 *
 * @author Olivier
 */
require_once 'Modele/Modele.php';
class Commentaire extends Modele {

  // Renvoie la liste des parametres
  public function getParametres($id) {
    $sql = 'select * from parametres where id=?';
    $parametres = $this->executerRequete($sql, array($id));
    return $parametres;

  }
}

