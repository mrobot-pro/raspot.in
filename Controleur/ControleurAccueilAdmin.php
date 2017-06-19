<?php

require_once 'Vue/Vue.php';


class ControleurAccueilAdmin {

  public function __construct() {
     
  }
  public function accueilAdmin() {
    $vue = new Vue("AccueilAdmin");
    $vue->generer(array()); 
    
}

}