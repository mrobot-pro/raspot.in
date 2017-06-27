<?php

require_once 'vue/VueAdmin.php';
require_once 'modele/Parametres.php';
require_once 'modele/MediaManager.php';

class ControleurAdminAppli {

  // Affiche la liste de tous les billets du blog
  public function adminappli() {
   
    $vue = new VueAdmin("AdminAppli");
    $vue->generer(array());

   $parametres = new Parametres();
    
    if (isset($_FILES['image_fond'])){
        //Vérification image uploadée
    if ($_FILES['image_fond']['error'] > 0) {
    $erreur = "Erreur lors du transfert";
    }
        
    // ENREGISTREMENT DE L'IMAGE UPLOADEE
    move_uploaded_file($_FILES["image_fond"]["tmp_name"], 'contenu/css/accueil.jpg');
    //header('location:adm.php');
    }
    //changement mot de passe 
    if(isset($_POST['changePassword'])){
    $parametres->updatePassword($_POST['mdp'],$parametres->getId());
    } 
    
      //changement evenement
    if(isset($_POST['changeEvent'])){
    $parametres->updateEvent($_POST['evenement'],$parametres->getId());
    } 

       //changement slogan
    if(isset($_POST['changeSlogan'])){
    $parametres->updateSlogan($_POST['slogan'],$parametres->getId());
    } 
    
     //reset
    if(isset($_POST['Reset'])){
    $mediaManager = new MediaManager();
    $mediaManager->reset();
    $parametres->resetParametres();
    } 
    //DELETE PICTURES AND VIGNETTES
       if(isset($_POST['delete_data_submit'])){
    $mediaManager = new MediaManager();
    $mediaManager->deleteMedias();
    } 
      //DELETE BACKUP
       if(isset($_POST['delete_backup_submit'])){
$mediaManager = new MediaManager();
    $mediaManager->deleteBackup();
    } 
    
	}
}