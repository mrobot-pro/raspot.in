<?php
// Accès aux données
// CONNEXION SQLITE //
require 'Modele.php';
try{
$medias = getMedias();
require 'vueAccueilAdmin.php';
}
 catch (Exception $e) {
  $msgErreur = $e->getMessage();
  require 'vueErreur.php';
 }



