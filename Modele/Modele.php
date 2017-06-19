<?php
abstract class Modele {
    
// Objet PDO d'accès à la BD
private $db; 
    
// Exécute une requête SQL éventuellement paramétrée
protected function executerRequete($sql, $params = null) {
if ($params == null) {
$resultat = $this->getDb()->query($sql);    // exécution directe
}
else {
$resultat = $this->getDb()->prepare($sql);  // requête préparée
$resultat->execute($params);
}
return $resultat;
}

// Renvoie un objet de connexion à la BD en initialisant la connexion au besoin
private function getDb() {
if ($this->db == null) {
// Création de la connexion
$this->db = new PDO('sqlite:db/snapspot.sqlite','','', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
return $this->db;
}

public function getParametres() {
  $db = getDb();
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING); // On émet une alerte à chaque fois qu'une requête a échoué.
  $datas = $db->prepare('select * from parametres where id=1');
  $datas->execute();
  $parametres = $datas->fetch(PDO::FETCH_ASSOC);
  return $parametres;
}



}
  
/*
// Renvoie la liste de tous les billets, triés par identifiant décroissant
function getMedias() {
    $db = getDb();
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING); // On émet une alerte à chaque fois qu'une requête a échoué.
    $medias = $db->prepare('select * from media');
    $medias->execute();
    $datas = $medias->fetchAll(PDO::FETCH_ASSOC);
    return $datas;
}
*/






