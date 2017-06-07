<?php
class Parametres
{
// CLASS ATTRIBUTS //    
  private 
          $_slogan,
          $_evenement,
          $_mdp;
    

  
public function __construct(array $donnees)
  {
    $this->hydrate($donnees);
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
  
  public function hydrate(array $donnees)
  {
    foreach ($donnees as $key => $value)
    {
      $method = 'set'.ucfirst($key);
      
      if (method_exists($this, $method))
      {
        $this->$method($value);
      }
    }
  }

}