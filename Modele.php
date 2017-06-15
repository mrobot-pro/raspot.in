<?php

// Renvoie la liste de tous les billets, triés par identifiant décroissant
function getMedias() {
    $db = new PDO('sqlite:snapspot.sqlite');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING); // On émet une alerte à chaque fois qu'une requête a échoué.
    $medias = $db->query('select * from media');
    return $medias;
}
