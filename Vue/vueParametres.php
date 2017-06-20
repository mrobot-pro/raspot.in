<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$titre = "SnapSpot"; 
ob_start();
echo '<article>';
echo '<header>';
echo $parametres['slogan'];
echo '</header>';
echo '<p>';
echo '<h1>'.$parametres['evenement'].'</h1>';
echo '</p>';
 echo '</article>';
$contenu = ob_get_clean();
require 'gabarit.php';
