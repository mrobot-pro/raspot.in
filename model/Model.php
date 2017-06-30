<?php

abstract class Model {

// Connexion object
    private $db;

// execute request
    protected function executeRequest($sql, $settings = null) {
        if ($settings == null) {
            $result = $this->getDb()->query($sql);    // exécution directe
        } else {
            $result = $this->getDb()->prepare($sql);  // requête préparée
            $result->execute($settings);
        }
        return $result;
    }

// return DB connexion object
    protected function getDb() {
        if ($this->db == null) {
// Create connexion
            $this->db = new PDO('sqlite:db/snapspot.sqlite', '', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        }
        return $this->db;
    }

}
