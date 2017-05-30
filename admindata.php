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