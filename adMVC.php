<?php

require 'Controleur/Routeur.php';

$routeur = new Routeur();
$routeur->accueilAdmin();
if (isset($_GET['admin'])) {
        if ($_GET['admin'] == 'Data') {
      
              $routeur->medias();
        }
         if ($_GET['admin'] == 'Appli') {
     
              $routeur->parametres();
        }
        
}