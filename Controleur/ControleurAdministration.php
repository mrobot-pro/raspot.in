<?php

require_once 'vue/VueAdmin.php';
require_once 'controleur/Routeur.php';

class ControleurAdministration {


  // Affiche le menu admin
  public function administration() {
 
    $vue = new VueAdmin("Administration");
    $vue->generer(array());
      
     if (isset($_GET['deconnexion'])) {
                  session_destroy();
                  exit();

        }  elseif(isset($_GET['Appli'])) {
        
 $this->adminappli();

        }elseif(isset($_GET['Data'])) {
                $this->admindata();
	}       
  }
  
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
        
        public function admindata() {
   
    $vue = new VueAdmin("AdminData");
    $vue->generer(array());

}
  
}