<?php

require_once '../controller/autoload.php';

class MediaManager extends Model
{

    public function add(Media $media)
    {
        $q = $this->getDb()->prepare('INSERT INTO media(oldName, fileSize, pseudo, comment, event) VALUES(:oldName, :fileSize, :pseudo, :comment, :event)');

        $q->bindValue(':oldName', $media->oldName());
        $q->bindValue(':fileSize', $media->fileSize());
        $q->bindValue(':pseudo', $media->pseudo());
        $q->bindValue(':comment', $media->comment());
        $q->bindValue(':event', $media->event());
        $q->execute();

        $media = $this->get(intval($this->getDb()->lastInsertId()));
        $media->updateNewName($media);
        $this->update($media);
        $media->saveFile();
    }

    public function reset()
    {
        //Effacement table media   
        $this->getDb()->exec('delete from media');
        //Effacement des photos et vignettes
        $this->deleteMedias();
        //Effacement des backup
        $this->deleteBackup();
        //Reset parametres
    }

    public function deleteMedias()
    {
        //Effacement table media   
        $this->getDb()->exec('delete from media');
        array_map('unlink', glob(Media::MEDIA_PATH . '*'));
        array_map('unlink', glob(Media::VIGN_PATH . '*'));
    }

    public function deleteBackup()
    {
        array_map('unlink', glob(Media::BACK_PATH . '*'));
    }

    public function count()
    {
        return $this->getDb()->query('SELECT COUNT(*) FROM media')->fetchColumn();
    }

    public function delete(Media $media)
    {
        $this->getDb()->exec('DELETE FROM media WHERE id = ' . $media->mediaId());
    }

    public function get($info)
    {
        if (is_int($info)) {
            $q = $this->getDb()->query('SELECT mediaId, oldName, newName, fileSize, timestamp,pseudo, comment, event FROM media WHERE mediaId = ' . $info);
            $dataMedia = $q->fetch(PDO::FETCH_ASSOC);
            return new Media($dataMedia);
        } else {
            echo 'erreur de type d\'informations';
        }
    }

    public function getList()
    {
        $sql = 'select * from media';
        $medias = $this->executeRequest($sql);
        return $medias;
    }

    public function update(Media $media)
    {
        $q = $this->getDb()->prepare('UPDATE media SET newName = :newName, pseudo = :pseudo, comment = :comment WHERE mediaId = :mediaId');
        $q->bindValue(':mediaId', $media->mediaId(), PDO::PARAM_INT);
        $q->bindValue(':newName', $media->newName(), PDO::PARAM_STR);
        $q->bindValue(':pseudo', $media->pseudo(), PDO::PARAM_STR);
        $q->bindValue(':comment', $media->comment(), PDO::PARAM_STR);
        $q->execute();
    }

}
