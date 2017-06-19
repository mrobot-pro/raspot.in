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
class Parametres extends Modele {

  // Renvoie la liste des parametres
  public function getParametres() {
    $sql = 'select * from parametres where id=1';
    $parametres = $this->executerRequete($sql);
      return $parametres->fetch();  // Accès à la première ligne de résultat
  }
  
}

