<?php

require_once 'view/ViewAdmin.php';
require_once 'model/Settings.php';
require_once 'model/MediaManager.php';

class AdminAppliController {

  // Affiche la liste de tous les billets du blog
  public function adminappli() {
      
   $parametres = new Settings();
   
   try{
    $vue = new ViewAdmin("AdminAppli");
    $vue->generer(array());

  } catch (Exception $e) {
  $msgErreur = $e->getMessage();
  require 'view/viewError.php';

}
    









        if (isset($_FILES['image_fond'])){
        //Vérification image uploadée
    if ($_FILES['image_fond']['error'] > 0) {
          require 'vue/vueErreur.php';
    $msgErreur = "Erreur lors du transfert";
    require 'vue/vueErreur.php';
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