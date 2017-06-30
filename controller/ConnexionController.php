<?php

require_once 'view/View.php';
require_once 'model/Settings.php';
require_once 'controller/AdministrationController.php';

class ConnexionController {

    public function connexion() {
        $parametres = new Settings();

        $vue = new View("Connexion");
        $vue->generer(array());


        if (isset($_POST['connexion'])) {

            if (password_verify($_POST['mdp'], $parametres->getMdp())) {
                $_SESSION['login'] = 'admin';
                $this->redirect('adm.php');
            } else {
                echo '<h2 class="text-center">Mauvais mot de passe !</h2>';
            }
        }
    }

    function redirect($url) {
        if (!headers_sent()) {
            header('Location: ' . $url);
            exit;
        } else {
            echo '<script type="text/javascript">';
            echo 'window.location.href="' . $url . '";';
            echo '</script>';
            echo '<noscript>';
            echo '<meta http-equiv="refresh" content="0;url=' . $url . '" />';
            echo '</noscript>';
            exit;
        }
    }

}
