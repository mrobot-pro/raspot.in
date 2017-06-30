<?php

require_once 'model/Model.php';

class Media extends Model {

// CLASS ATTRIBUTS //    
    private
            $_mediaId,
            $_oldName,
            $_newName,
            $_fileSize,
            $_pseudo,
            $_commentaire,
            $_timestamp,
            $_evenement;

// CLASS CONSTANTES //   
    const MEDIA_PATH = 'contenu/data/picture/';
    const VIGN_PATH = 'contenu/data/thumbnail/';
    const BACK_PATH = 'contenu/data/backup/';

    public function __construct(array $dataMedia) {
        $this->hydrate($dataMedia);
    }

    public function hydrate(array $dataMedia) {
        foreach ($dataMedia as $key => $value) {
            $method = 'set' . ucfirst($key);

            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }

    // GETTERS - ACCESSEURS //

    public function mediaId() {
        return $this->_mediaId;
    }

    public function oldName() {
        return $this->_oldName;
    }

    public function newName() {
        return $this->_newName;
    }

    public function fileSize() {
        return $this->_fileSize;
    }

    public function pseudo() {
        return $this->_pseudo;
    }

    public function commentaire() {
        return $this->_commentaire;
    }

    public function timestamp() {
        return $this->_timestamp;
    }

    public function evenement() {
        return $this->_evenement;
    }

    // SETTERS - MUTATEURS //

    public function setMediaId($mediaId) {
        $this->_mediaId = $mediaId;
    }

    public function setOldName($oldName) {
        $this->_oldName = $oldName;
    }

    public function setNewName($newName) {
        $this->_newName = $newName;
    }

    public function setPseudo($pseudo) {
        $this->_pseudo = $pseudo;
    }

    public function setCommentaire($commentaire) {
        $this->_commentaire = $commentaire;
    }

    public function setFileSize($fileSize) {
        $this->_fileSize = $fileSize;
    }

    public function setTimestamp($timestamp) {
        $this->_timestamp = $timestamp;
    }

    public function setEvenement($evenement) {
        $this->_evenement = $evenement;
    }

    // FONCTIONS //

    public function updateNewName() {
        $this->_newName = $this->cleanFileName($this->mediaId() . '_' . $this->evenement() . '.' . $this->getExtension());
    }

    public function getExtension() {
        $i = strrpos($this->oldName(), ".");
        if (!$i) {
            return "";
        }
        $l = strlen($this->oldName()) - $i;
        $ext = strtolower(substr($this->oldName(), $i + 1, $l));
        return $ext;
    }

    function cleanFileName($str, $charset = 'utf-8') {
        $str = htmlentities($str, ENT_NOQUOTES, $charset);

        $str = preg_replace('#&([A-za-z])(?:acute|cedil|caron|circ|grave|orn|ring|slash|th|tilde|uml);#', '\1', $str);
        $str = preg_replace('#&([A-za-z]{2})(?:lig);#', '\1', $str); // pour les ligatures e.g. '&oelig;'
        $str = preg_replace('#&[^;]+;#', '', $str); // supprime les autres caractères
        $str = preg_replace('`[!\']`', '', $str);

        return $str;
    }

    public function saveFile() {
// ENREGISTREMENT DE L'IMAGE UPLOADEE
        move_uploaded_file($_FILES["mon_fichier"]["tmp_name"], Media::MEDIA_PATH . $this->newName());
// COPY MEDIA FROM STOCK TO BACKUP
        copy(Media::MEDIA_PATH . $this->newName(), Media::BACK_PATH . $this->newName());
//CREATE THUMBNAIL //
        $src = imagecreatefromjpeg($this::MEDIA_PATH . $this->newName());
        list($width, $height) = getimagesize(Media::MEDIA_PATH . $this->newName());

        $newheight = 100;
        $newwidth = ($width / $height) * $newheight;
        $tmp = imagecreatetruecolor($newwidth, $newheight);
        imagecopyresampled($tmp, $src, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
        $vigname = Media::VIGN_PATH . $this->newName();
        imagejpeg($tmp, $vigname, 100);
        imagedestroy($src);
        imagedestroy($tmp);
    }

}