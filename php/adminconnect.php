<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

echo '<center>';
  echo "<form action='adm.php' method='post'>";
     echo "<label>Mot de passe</label><input type='password' name='mdp' value='' required>";
     echo "<input class='btn' type='submit' value='Valider'>";
   echo '</form>';   
echo '</center>';
if(isset($_POST['mdp']))
{
    if($_POST['mdp']==$donnees['mdp'])
    {
        $_SESSION['login']   = 'admin';
}
    else
    {
 echo 'Mauvais mot de passe !';
        
    }
}