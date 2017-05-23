<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include ('./php/includes/heading.php');
include ('./php/includes/header.php');

echo '<center><ul id="menu_horizontal">';
echo '<li class="btn" ><a href="adminappli.php">Appli</a></li>';
echo '<li class="btndata" ><a href="admindata.php">Data</a></li>';
echo '</ul></center>';

echo <<< EOT

<form action="" method="post">
         <center>
        <label>Vider SDCard</label>
                <input class="btn" type="submit" value="Valider" /><br>
        <label>Vider BackUP</label>
                <input class="btn" type="submit" value="Valider" /><br>
        <p>Utilisation du Disque Principal:<br>
                <progress id="avancement" value="50" max="100"></progress>
                </p>
        </center>
</form>

EOT;

echo '<center><ul id="menu_horizontal">';
echo '<li class="btn"><a href="adminmenu.php">Retour Menu</a></li>';
echo '</ul></center>';

include ('./php/includes/footer.php');
