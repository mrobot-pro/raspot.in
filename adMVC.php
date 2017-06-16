<?php
// Accès aux données
// CONNEXION SQLITE //
require 'Modele.php';
try{
$medias = getMedias();
require 'vueAccueilAdmin.php';
}
 catch (Exception $e) {
     echo '<html><body>Erreur ! '.$e->getMessage().'</body></html>';
 }



