<?php

class MediaManager
{
  private $_db; // Instance de PDO
  public function __construct($db)
  {
    $this->setDb($db);
  }
  
  public function add(Media $media)
  {
    $q = $this->_db->prepare('INSERT INTO media(oldName, newName, fileSize, pseudo, commentaire, evenement) VALUES(:oldName, :newName, :fileSize, :pseudo, :commentaire, :evenement)');
    $q->bindValue(':oldName', $media->oldName());
    $q->bindValue(':newName', $media->newName());
    $q->bindValue(':fileSize', $media->fileSize());
    $q->bindValue(':pseudo', $media->pseudo());
    $q->bindValue(':commentaire', $media->commentaire());
    $q->bindValue(':evenement', $media->evenement());
    $q->execute();
    
    $media->hydrate([
     'mediaId' => $this->_db->lastInsertId(),
     'newName' => $this->_db->lastInsertId().$media->evenement().$media->getExtension()  
    ]);
  }

  public function count()
  {
    return $this->_db->query('SELECT COUNT(*) FROM media')->fetchColumn();
  }
  
  public function delete(Media $media)
  {
    $this->_db->exec('DELETE FROM media WHERE id = '.$media->mediaId());
  }
  public function get($info)
  {
    if (is_int($info))
    {
      $q = $this->_db->query('SELECT mediaId, oldName, newName, mediaPath, fileSize, pseudo, commentaire, evenement FROM media WHERE mediaId = '.$info);
      $donnees = $q->fetch(PDO::FETCH_ASSOC);
      return new Media($donnees);
    }
    else
    {
      //$q = $this->_db->prepare('SELECT mediaId, oldName, newName, mediaPath, fileSize, pseudo, commentaire FROM media WHERE pseudo = :pseudo');
      //$q->execute([':pseudo' => $info]);
      //return new Media($q->fetch(PDO::FETCH_ASSOC));
    }
  }
  
  public function getList()
  {
    $medias = [];
    $q = $this->_db->prepare('SELECT mediaId, oldName, newName, fileSize, pseudo, commentaire, evenement FROM media');
    $q->execute();
    while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
    {
      $medias[] = new Media($donnees);
    }
    return $medias;
  }
  
  public function update(Media $media)

  {
$q = $this->_db->prepare('UPDATE media SET pseudo = :pseudo, commentaire = :commentaire WHERE mediaId = :mediaId');
$q->bindValue(':pseudo', $media->pseudo(), PDO::PARAM_INT);
$q->bindValue(':commentaire', $media->commentaire(), PDO::PARAM_INT);
$q->bindValue(':mediaId', $media->mediaId(), PDO::PARAM_INT);
$q->execute();
 }
  
  public function setDb(PDO $db)
  {
    $this->_db = $db;
  }
}