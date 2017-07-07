<?php

require_once 'autoload.php';

class HomeController
{

    // Display for Home request and manage picture uploaded
    public function home()
    {

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
            //Checking File tranfser
            if ($_FILES['my_file']['error'] > 0) {
                echo 'Erreur lors du transfert';
            } elseif (preg_match('#[\x00-\x1F\x7F-\x9F/\\\\]#', $_FILES['my_file']['name'])) {
                exit("Nom de fichier non valide");
            } else {
                //manage files settings
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
