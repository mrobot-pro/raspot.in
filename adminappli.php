<?php

include ('./php/includes/heading.php');
include ('./php/includes/header.php');

echo <<< EOT

<form action="" method="post">
       
        <label class="position">Nom de l\'Evenement:</label><br>
                <input class="position" type="text" name="evenement" placeholder="Evenement..." />
                <input class="btn" type="submit" value="Valider"/><br>
        <label class="position">Message d\'Explication:</label><br>
                <input class="position" type="text" name="explication" placeholder="Slogan..." />
                <input class="btn" type="submit" value="Valider"/><br>
        <label class="position">Changer de Mot de Passe:</label><br>
                <input class="position" type="password" name="password" placeholder="********" />
                <input class="btn" type="submit" value="Valider"/><br>
        <label class="position">Changer Image de Fond:</label><br>
                <input class="position" type="file" name="imagefond" />
                <input class="btn" type="submit" value="Valider"/><br>
        <label class="position">Taille Maximale des Photos:</label><br>
                <input class="position" type="number" name="taillemaxphoto" min="0" max="20" placeholder="En MegaOctet..." />
                <input class="btn" type="submit" value="Valider"/><br>
        <p class="position">Utilisation du Disque Principal:<br>
                <progress  class="position" id="avancement" value="50" max="100"></progress>
                </p>
        
</form>

EOT;

echo '<center><ul id="menu_horizontal">';
echo '<li class="btn"><a href="adm.php">Menu</a></li>';
echo '</ul></center>';

include ('./php/includes/footer.php');
