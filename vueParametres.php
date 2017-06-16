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
    echo '<h1>Parametres : '.$Parametres['type'].'</h1>';
  echo '</header>';
  echo '<p>';
   <time><?= $billet['date'] ?></time>
  echo '</p>';
echo '</article>';
<hr />

$contenu = ob_get_clean();
require 'gabarit.php';