<?php

require_once 'Modele/MediaManager.php';
require_once 'Vue/Vue.php';

class ControleurAccueil {

  // Affiche la liste de tous les billets du blog
  public function accueil() {
   
    $vue = new Vue("Accueil");
    $vue->generer(array());
    $parametres = new Parametres();
    echo var_dump($parametres);
    $mediaManager = new MediaManager(get);
    
    if (isset($_FILES['mon_fichier'])){
        //Vérification image uploadée
    if ($_FILES['mon_fichier']['error'] > 0) {
    echo 'Erreur lors du transfert';
     echo var_dump($_FILES);
    }
else{
    //  NOUVELLE INSTANCE DE LA CLASS MEDIA = OBJET $media
    $media = new Media([
          'oldName' => $_FILES["mon_fichier"]["name"],                          
          'fileSize' => $_FILES["mon_fichier"]["size"], 
          'evenement'=>  $parametres->getEvenement()
         
            ]);
 
  

    $vignette= Media::VIGN_PATH.$media->newName();
    echo var_dump($_FILES);
    echo var_dump($media);
    $mediaManager->add($media);
    $media->updateNewName($mediaManager);
    
    
}
    
    }
    
    
    
  }
}