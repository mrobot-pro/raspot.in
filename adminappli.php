<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="fr">
        <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>SnapSpot</title>
                <link rel="stylesheet" href="./css/default.css" title = "default">
        </head>
        <body>

<header>
<center><h1><a href="index.php">Snap Snap Spot !</a></h1></center>
<!-- <center><img src="./image/favicon.png" alt="logo_appli" /></center> -->
</header>
<body>

<?php

echo '<center><ul id="menu_horizontal">';
echo '<li class="btnappli" ><a href="adminappli.php">Appli</a></li>';
echo '<li class="btn" ><a href="admindata.php">Data</a></li>';
echo '</ul></center>';

echo <<< EOT

<form action="index.php" method="post">
       
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
echo '<li class="btn"><a href="adm.php">Retour Menu</a></li>';
echo '</ul></center>';

?>
                <footer>
            <center>
                <p>&copy;2017 - David Fournier&nbsp;&amp;&nbsp;Olivier Welter.</p>
            </center>
        </footer>
        </body>
</html>