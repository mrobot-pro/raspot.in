<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require 'Modele.php';

function accueilAdmin() {
  require 'vueAccueilAdmin.php';
}

function accueil() {
  require 'vueAccueil.php';
}

// Affiche la liste de tous les billets du blog
function parametres() {
  $parametres = getParametres();
  require 'vueParametres.php';
}

// Affiche les détails sur un billet
function medias() {
  $medias = getMedias();
  require 'vueMedias.php';
}

// Affiche une erreur
function erreur($msgErreur) {
  require 'vueErreur.php';
}