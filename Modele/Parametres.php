<?php
require_once 'modele/Modele.php';
class Parametres extends Modele
{
// CLASS ATTRIBUTS //    
  private 
          $_id,
          $_slogan,
          $_evenement,
          $_mdp,
          $_type;
    
public function __construct()
  {
    $this->hydrate($this->getParametre(1));
  }

  
  // GETTERS - ACCESSEURS //
  
   public function getId()
  {
    return $this->_id;
  }
  
  public function getSlogan()
  {
    return $this->_slogan;
  }
  public function getEvenement()
  {
    return $this->_evenement;
  }
  public function getMdp()
  {
    return $this->_mdp;
  }
  public function getType()
  {
    return $this->_type;
  }
  
  // SETTERS - MUTATEURS //
  
    public function setId($id)
 {
      $this->_id = $id;
  }
  public function setSlogan($slogan)
 {
      $this->_slogan = $slogan;
  }
  public function setEvenement($evenement)
  {
      $this->_evenement = $evenement;
  }
  public function setMdp($mdp)
  {
      $this->_mdp = $mdp;
  }
     public function setType($type)
  {
      $this->_type = $type;
  }

  // FONCTIONS //
  
  
    public function getParametre($id)  {
    $sql='SELECT * FROM parametres where id=?';
 $parametre = $this->executerRequete($sql, array($id));
  return $parametre->fetch();
  }
  
    public function getParametres() {
         $sql='SELECT * FROM parametres';
        $parametres = $this->executerRequete($sql);
        return $parametres->fetchall();
    }
  
 
  
    public function updateParametres($evenement, $slogan, $mdp, $id) {
        $this->_evenement = $evenement;
        $this->_slogan = $slogan;
        $this->_mdp = $mdp;
    $sql = 'update parametres set evenement= ?, slogan= ?, mdp= ? where id=?';
    $this->executerRequete($sql, array($evenement, $slogan, $mdp, $id));
  }
  
   public function resetParametres() {
      $mdp=$this->_mdp = password_hash('admin', PASSWORD_DEFAULT);
      $slogan=$this->_slogan = 'Partagez vos photos sur ce spot tout au long de la soirée !';
      $evenement=$this->_evenement = "Saisissez ici le nom de l'événement !" ;
      $this->updateParametres($evenement, $slogan, $mdp, 1);
  }
  
   public function updatePassword($mdp, $id) {
       $mdpN= password_hash($mdp, PASSWORD_DEFAULT);
        $this->_mdp = $mdpN;
    $sql = 'update parametres set mdp= ? where id=?';
    $this->executerRequete($sql, array($mdpN, $id));
  }
  
     public function updateEvent($event, $id) {
        $this->_evenement = $event;
    $sql = 'update parametres set evenement= ? where id=?';
    $this->executerRequete($sql, array($event, $id));
    
  }
  
       public function updateSlogan($slogan, $id) {
        $this->_slogan = $slogan;
    $sql = 'update parametres set slogan= ? where id=?';
    $this->executerRequete($sql, array($slogan, $id));
  }
  
  public function hydrate(array $parametres)
  {
    foreach ($parametres as $key => $value)
    {
      $method = 'set'.ucfirst($key);
      if (method_exists($this, $method))
      {
        $this->$method($value);
      }
    }
  }

}