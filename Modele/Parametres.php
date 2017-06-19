<?php
require_once 'Modele/Modele.php';
class Parametres extends Modele
{
// CLASS ATTRIBUTS //    
  private 
          $_slogan,
          $_evenement,
          $_mdp;
    

  
public function __construct(array $parametres)
  {
    $this->hydrate($parametres);
  }


  
  // GETTERS - ACCESSEURS //
  
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

  
  // SETTERS - MUTATEURS //
  
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
   

  // FONCTIONS //
  
    public function getParametres()  {
    $sql='SELECT * FROM parametres where id=1';
 $medias = $this->executerRequete($sql);
  return $parametres;
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