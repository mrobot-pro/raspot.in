<?php
    session_start() ;
// AUTOLOAD //
require('php/autoload.php');

    // CONNEXION SQLITE //
$db = new PDO('sqlite:snapspot.sqlite');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING); // On émet une alerte à chaque fois qu'une requête a échoué.

//  NOUVELLE INSTANCE DE LA CLASS MANAGER = OBJET $manager //
$manager = new MediaManager($db);

//  NOUVELLE INSTANCE DE LA CLASS PARAMETRES = OBJET $parametres //
    $q = $db->query('SELECT slogan, evenement, mdp FROM parametres WHERE id = 1');
    $donnees = $q->fetch(PDO::FETCH_ASSOC);
  
?>

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
      
<form method="post" id='uploadform' action="index.php" enctype="multipart/form-data">
<center><img src="./css/camera.ico" id="upfile1" width="75" style="cursor:pointer" image-orientation="center"  alt="logo_appli" type="submit" />
<!-- MAX_FILE_SIZE doit précéder le champ input de type file 
<input type="hidden" name="MAX_FILE_SIZE" value="30000" /> -->
<input type="file" id="mon_fichier"  name="mon_fichier" style="display:none"  />
</form>
    <?php

if (isset($_FILES['mon_fichier'])){
    //Vérification image uploadée
if ($_FILES['mon_fichier']['error'] > 0) {
$erreur = "Erreur lors du transfert";
}
    
    //  NOUVELLE INSTANCE DE LA CLASS MEDIA = OBJET $media
$media = new Media([
      'oldName' => $_FILES["mon_fichier"]["name"],                          
      'fileSize' => $_FILES["mon_fichier"]["size"], 
    
     ]);
$media->setNewName(md5(uniqid(rand(), true)).'.'.$media->getExtension());
$media->saveFile();

$vignette= Media::VIGN_PATH.$media->newName();
$manager->add($media);
}

echo '<div>';
echo '<h1>'.$donnees['slogan'].'</h1>';
echo'</div></center>';
echo '<center><p>'.$donnees['evenement'].'</p></center>';
?> 
        
        <footer>
            <center>
		<p>&copy;2017 - David Fournier&nbsp;&amp;&nbsp;Olivier Welter.</p>
            </center>
        </footer>
    </body>
</html>
  <script type="text/javascript" src="js/jquery-3.2.1.js" ></script>
  <script type="text/javascript" src="js/snapspot.js" ></script>
