<?php

require('Controleur.php');
      accueil();

  if (isset($_GET['medias'])) {
    if ($_GET['medias'] == 'Data') {
    medias();  // action par défaut
    }
  }
  
  if (isset($_GET['parametres'])) {
    if ($_GET['parametres'] == 'Appli') {
    parametres();  // action par défaut
    }
  }


