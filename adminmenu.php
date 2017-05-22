<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

if(isset($_POST['mdp']) AND ($_POST['mdp'] == "admin")) {
	
include('./php/includes/heading.php');

include('./php/includes/header.php');

echo '<center><ul id="menu_horizontal">';
echo '<li><a href="adminappli.php">Appli</a></li>';
echo '<li><a href="admindata.php">Data</a></li>';
echo '</ul></center>';

include ('./php/includes/footer.php');

}
else {
    include('./php/includes/heading.php');
    include('./php/includes/header.php');
    echo'<center><p>Mot de Passe non reconnu <br>Veuillez contacter <br>l\'Administrateur !</p></center>';
    include('./php/includes/footer.php');
}
