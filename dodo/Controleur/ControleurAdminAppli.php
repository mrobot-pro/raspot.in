<?php

require_once 'Vue/VueAdmin.php';
require_once 'Modele/Parametres.php';

class ControleurAdminAppli {

  // Affiche la liste de tous les billets du blog
  public function adminappli() {
   
    $vue = new VueAdmin("AdminAppli");
    $vue->generer(array());

    if (isset($_FILES['image_fond'])){
        //Vérification image uploadée
    if ($_FILES['image_fond']['error'] > 0) {
    $erreur = "Erreur lors du transfert";
    }
        
    // ENREGISTREMENT DE L'IMAGE UPLOADEE
    move_uploaded_file($_FILES["image_fond"]["tmp_name"], 'contenu/css/accueil.jpg');
    //header('location:adm.php');
    }
    //appel traitement changement mot de passe 
    if(isset($_POST['change_password']))
{
    $q = $db->prepare('UPDATE parametres SET mdp = :mdp WHERE id = 1');
    $q->bindValue(':mdp', password_hash($_POST['mdp'], PASSWORD_DEFAULT), PDO::PARAM_STR);
    $q->execute();
    //header('location:adm.php');
    exit;
} 
    

    //appel traitement changement parametres
    if(isset($_POST['valider']))
    {
        $q = $db->prepare('UPDATE parametres SET evenement = :evenement, slogan = :slogan, mdp = :mdp WHERE id = 1');
        $q->bindValue(':evenement', $_POST['evenement'], PDO::PARAM_STR);
        $q->bindValue(':slogan', $_POST['slogan'], PDO::PARAM_STR);
        $q->bindValue(':mdp', $_POST['mdp'], PDO::PARAM_STR);
        $q->execute();
        //header('location:adm.php');
        exit;
    }
    
	}
}