<?php
require_once 'Modele/Modele.php';
class Media extends Modele
{
  
  public function add(Media $media)
  {
    $q = $this->_db->prepare('INSERT INTO media(oldName, fileSize, pseudo, commentaire, evenement) VALUES(:oldName, :fileSize, :pseudo, :commentaire, :evenement)');
    
    $q->bindValue(':oldName', $media->oldName());
    $q->bindValue(':fileSize', $media->fileSize());
    $q->bindValue(':pseudo', $media->pseudo());
    $q->bindValue(':commentaire', $media->commentaire());
    $q->bindValue(':evenement', $media->evenement());
    $q->execute();
    
    $media = $this->get(intval($this->_db->lastInsertId()));
    $media->updateNewName($media);
    $this->update($media);
    $media->saveFile();
  }

  public function count()
  {
    return $this->_db->query('SELECT COUNT(*) FROM media')->fetchColumn();
  }
  
  public function delete(Media $media)
  {
    $this->_db->exec('DELETE FROM media WHERE id = '.$media->mediaId());
  }
  // INFO MEDIA
  public function getMedia($mediaId) {
    $sql = 'select * from media where mediaId=?';
    $media = $this->executerRequete($sql, array($mediaId));
    if ($media->rowCount() == 1)
      return $media->fetch();  // Accès à la première ligne de résultat
    else
      throw new Exception("Aucun billet ne correspond à l'identifiant '$mediaId'");
    }

  //LISTE DES MEDIAS
  public function getMedias()  {
    $sql='SELECT * FROM media';
 $medias = $this->executerRequete($sql);
  return $medias;
  }
  
 
  
  public function update(Media $media)

  {
$q = $this->_db->prepare('UPDATE media SET newName = :newName, pseudo = :pseudo, commentaire = :commentaire WHERE mediaId = :mediaId');
$q->bindValue(':mediaId', $media->mediaId(), PDO::PARAM_INT);
$q->bindValue(':newName', $media->newName(), PDO::PARAM_STR);
$q->bindValue(':pseudo', $media->pseudo(), PDO::PARAM_STR);
$q->bindValue(':commentaire', $media->commentaire(), PDO::PARAM_STR);
$q->execute();
 }
  

}