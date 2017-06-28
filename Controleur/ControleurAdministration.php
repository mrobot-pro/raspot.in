<?php

require_once 'controleur/ControleurAdminMenu.php';
require_once 'controleur/ControleurConnexion.php';
require_once 'controleur/ControleurAdminAppli.php';
require_once 'controleur/ControleurAdminData.php';

class ControleurAdministration {


  private $ctrlAdminmenu;
  private $ctrlConnexion;
  private $ctrlAdminAppli;
  private $ctrlAdminData;

  public function __construct() {
    $this->ctrlAdminmenu = new ControleurAdminMenu();
    $this->ctrlConnexion = new ControleurConnexion();
    $this->ctrlAdminAppli = new ControleurAdminAppli();
    $this->ctrlAdminData = new ControleurAdminData();
  }
  
  // Affiche le menu admin
  public function administration() {
      
          if(!empty($_SESSION) && $_SESSION['login'] == 'admin') {

        if (isset($_GET['deconnexion'])) {

                  session_destroy();
                  header('Location: .');
                  exit();

        }elseif(isset($_GET['Appli'])) {
$this->ctrlAdminAppli->adminappli();

        }elseif(isset($_GET['Data'])) {

                $this->ctrlAdminData->admindata();

        }else{

        $this->ctrlAdminmenu->adminmenu();

        }
    
    }else{
        $this->ctrlConnexion->connexion();
    }
}
}
