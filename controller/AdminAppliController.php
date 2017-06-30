<?php

require_once 'view/ViewAdmin.php';
require_once 'model/Settings.php';
require_once 'model/MediaManager.php';

class AdminAppliController {

    // Affiche la liste de tous les billets du blog
    public function adminappli() {

        $settings = new Settings();

        try {
            $view = new ViewAdmin("AdminAppli");
            $view->generer(array());
        } catch (Exception $e) {
            $msgErreur = $e->getMessage();
            require 'view/viewError.php';
        }
        if (isset($_FILES['image_fond'])) {
            //Vérification image uploadée
            if ($_FILES['image_fond']['error'] > 0) {
                
            }

            // ENREGISTREMENT DE L'IMAGE UPLOADEE
            move_uploaded_file($_FILES["image_fond"]["tmp_name"], 'contenu/css/accueil.jpg');
        }
        //changement mot de passe 
        if (isset($_POST['changePassword'])) {
            $settings->updatePassword($_POST['mdp'], $settings->getId());
            echo "<meta http-equiv='refresh' content='0'>";
        }

        //changement evenement
        if (isset($_POST['changeEvent'])) {
            $settings->updateEvent($_POST['event'], $settings->getId());
            echo "<meta http-equiv='refresh' content='0'>";
        }

        //changement slogan
        if (isset($_POST['changeSlogan'])) {
            $settings->updateSlogan($_POST['slogan'], $settings->getId());
            echo "<meta http-equiv='refresh' content='0'>";
        }

        //reset
        if (isset($_POST['Reset'])) {
            $mediaManager = new MediaManager();
            $mediaManager->reset();
            $settings->resetSettings();
            echo "<meta http-equiv='refresh' content='0'>";
        }
        //DELETE PICTURES AND VIGNETTES
        if (isset($_POST['delete_data_submit'])) {
            $mediaManager = new MediaManager();
            $mediaManager->deleteMedias();
            echo "<meta http-equiv='refresh' content='0'>";
        }
        //DELETE BACKUP
        if (isset($_POST['delete_backup_submit'])) {
            $mediaManager = new MediaManager();
            $mediaManager->deleteBackup();
        }
    }

}
