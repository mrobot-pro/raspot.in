<?php
    require('php/autoload.php');
    session_start() ;

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
    	<link href="css/default.css" rel="stylesheet">
        <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
    </head>
    <body>
        <!--ENTETE-->
        <div id="main-container" class="container-fluid">
            <div class="text-center">
                <h1>
                    <a class="heading" href="index.php">Snap Snap Spot !</a>
                </h1>
            </div>
            <div class="row text-center">
                <div class="col-xs-12">
                <form method="post" id='uploadform' action="index.php" enctype="multipart/form-data">
                <img class="cameraico" src="./css/camera.ico" id="upfile1" width="75" style="cursor:pointer" alt="logo_appli" type="submit" />
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

    echo '<div id="explain">';
    echo '<h1>'.$donnees['slogan'].'</h1>';
    echo '<p>'.$donnees['evenement'].'</p></div></div></div>';
?> 
        
        <footer class="text-center">
		<p>&copy;2017 - David Fournier&nbsp;&amp;&nbsp;Olivier Welter.</p>
        </footer>

        <script type="text/javascript" src="js/jquery.js" ></script>
        <script type="text/javascript" src="js/snapspotIndex.js" ></script>
    </body>
</html>
