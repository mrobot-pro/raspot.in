<?php

// Renvoie la liste de tous les billets, triés par identifiant décroissant
function getMedias() {
    $db = getDb();
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING); // On émet une alerte à chaque fois qu'une requête a échoué.
    $medias = $db->query('select * from media');
    $datas = $medias->fetchAll(PDO::FETCH_ASSOC);
    return $datas;
}
// Effectue la connexion à la BDD
// Instancie et renvoie l'objet PDO associé
function getDb() {
  $db = new PDO('sqlite:snapspot.sqlite');
  return $db;
}
