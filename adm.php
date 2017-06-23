<?php

session_start();

require 'controleur/Routeur.php';

$routeur = new Routeur();

    if(!empty($_SESSION) && $_SESSION['login'] == 'admin') {

        if (isset($_GET['deconnexion'])) {
                  session_destroy();
                  $routeur->accueil();
        }elseif(isset($_GET['Appli'])) {

                $routeur->adminappli();

        }elseif(isset($_GET['Data'])) {

                $routeur->admindata();

        }else{

        $routeur->administration();

        }
    
    }else{
        $routeur->connexion();
    }

