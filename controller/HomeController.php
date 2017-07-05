<?php

require_once 'autoload.php';

class HomeController {

    // Affiche la liste de tous les billets du blog
    public function home() {

        try {
            $view = new View("Home");
            $view->generer(array());
            $settings = new Settings();
        } catch (Exception $e) {
            $msgErreur = $e->getMessage();
            require '../view/viewError.php';
        }
        $mediaManager = new MediaManager();

        if (isset($_FILES['my_file'])) {
            //Vérification image uploadée
            if ($_FILES['my_file']['error'] > 0) {
                echo 'Erreur lors du transfert';
            } elseif (preg_match('#[\x00-\x1F\x7F-\x9F/\\\\]#', $_FILES['my_file']['name'])) {
                exit("Nom de fichier non valide");
            } else {
                //  NOUVELLE INSTANCE DE LA CLASS MEDIA = OBJET $media
                $media = new Media([
                    'oldName' => $_FILES["my_file"]["name"],
                    'fileSize' => $_FILES["my_file"]["size"],
                    'event' => $settings->getEvent()
                ]);
                $mediaManager->add($media);
                $media->updateNewName($mediaManager);
                header('location:index.php');
            }
        }
    }

}
