 <?php
    require('contenu/php/autoload.php');
    session_start() ;

     // CONNEXION SQLITE //
    $db = new PDO('sqlite:db/snapspot.sqlite');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING); // On émet une alerte à chaque fois qu'une requête a échoué.

    //  CREATION TABLEAU PARAMETRES //
        $qPar = $db->query('SELECT slogan, evenement, mdp FROM parametres WHERE id = 1');
        $dataParam = $qPar->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="fr">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>SNAPSPOT ADMIN</title>
                <link href="contenu/css/default.css" rel="stylesheet">
     <link href="contenu/bootstrap/css/bootstrap.css" rel="stylesheet">
	</head>

	<body>

<?php
    // SI ADMINISTRATEUR //
    if(!empty($_SESSION) && $_SESSION['login'] == 'admin')
    {
        if (isset($_GET['deconnexion']))
    {
      session_destroy();
      header('Location: .');
      exit();
    }

    echo '<div id="main-container" class="container-fluid">';
    echo '<h3 class="btn btn-primary" id="deco"><a class="heading" href="?deconnexion=1">Déconnexion</a></h3>';
    echo '<div class ="text-center"><h1><a class="heading"  href="index.php">Snap Snap Spot !</a></h1>';
    echo '<h3 class="heading text-center">Administration</h3>';
    echo '<div class="col-lg-offset-3 col-lg-6 col-md-offset-2 col-md-8 col-xs-12">';
    echo '<div class="row">';
    echo '<form action="" method="get">';
    echo '<input class="btn btn-primary" type="submit" name="Appli" value="Appli" style="margin-right:2em">';
    echo '<input class="btn btn-primary" type="submit" name="Data" value="Data">';
    echo '</form></div></div></div>'; 

    if(isset($_GET['Appli']))
    {

    echo '<div class="col-lg-offset-2 col-lg-8 col-md-offset-2 col-md-8 col-xs-12">';
    echo '<form class="row" action="" method="post">';


    echo '<div class="col-lg-offset-2 col-lg-8 col-md-offset-2 col-md-8 col-xs-12"><br>';
    echo "<label for='slogan'>Nom de l'Evenement:</label>";
    echo '<div class="input-group">';
    echo "<input id='slogan' class='form-control' type='text' name='slogan' value='".$dataParam['slogan']."' />";
    echo '<div class="input-group-btn">';
    echo "<input class='btn btn-primary' type='submit' name='valider' value='Valider'/></div></div></div>";


    echo '<div class="col-lg-offset-2 col-lg-8 col-md-offset-2 col-md-8 col-xs-12"><br>';
    echo "<label for='evenement'>Slogan:</label>";
    echo '<div class="input-group">';
    echo "<input id='evenement' class='form-control' type='text' name='evenement' value='".$dataParam['evenement']."' />";
    echo '<div class="input-group-btn">';
    echo "<input class='btn btn-primary' type='submit' name='valider' value='Valider'/></div></div></div>";


    echo '<div class="col-lg-offset-2 col-lg-8 col-md-offset-2 col-md-8 col-xs-12"><br>';
    echo "<label for='password'>Mot de Passe:</label>";
    echo '<div class="input-group">';
    echo "<input class='form-control' type='password' name='mdp' value='".$dataParam['mdp']."' /><br>";
    echo '<div class="input-group-btn">';
    echo "<input class='btn btn-primary' type='submit' name='change_password' value='Valider'/></div></div></div>";
    echo "</form>";


    echo '<div class="col-lg-offset-2 col-lg-8 col-md-offset-2 col-md-8 col-xs-12"><br>';
    echo '<label for="change_fond">Changer Fond d\'Ecran</label>';
    echo '<div class="input-group">';
    echo "<form class='row' method='post' id='change_fond' action='' enctype='multipart/form-data'>";
    echo "<input style='cursor:pointer' type='file' id='image_fond' name='image_fond'   /></div></div>";
    echo "</form>";


    echo '<div class="col-lg-offset-2 col-lg-8 col-md-offset-2 col-md-8 col-xs-12"><br>';   
    echo '<label for>Utilisation du disque</label>';
    echo '<div class="row">';
    echo '<div class="col-xs-12">';
    echo '<div class="progress text-center" style="text-indent: -89%;">';
    echo '<div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuemin="0" aria-valuemax="100" style="min-width: 2em;width: 89%;"></div>';
    echo '<span>89% / 14.0 Go disponible</span></div></div></div></div>';  


    echo'<div class="col-lg-offset-2 col-lg-10 col-md-offset-2 col-md-8 col-xs-12"><br>
        <label for>Nettoyage du disque</label>

        <div class="input-group-btn">
        <input class="btn btn-primary confirm-delete disabled" type="submit" name="delete_backup_submit" value="Vider les sauvegardes (0)"/>
        <input class="btn btn-primary confirm-delete disabled" type="submit" name="delete_photos_submit" value="Vider les images (0)"/>
        </div></div></div>';
    

    if (isset($_FILES['image_fond'])){
        //Vérification image uploadée
    if ($_FILES['image_fond']['error'] > 0) {
    $erreur = "Erreur lors du transfert";
    }
        
    // ENREGISTREMENT DE L'IMAGE UPLOADEE
    move_uploaded_file($_FILES["image_fond"]["tmp_name"], 'css/accueil.jpg');
    //header('location:adm.php');
    }

    if(isset($_POST['change_password']))
{
    $q = $db->prepare('UPDATE parametres SET mdp = :mdp WHERE id = 1');
    $q->bindValue(':mdp', password_hash($_POST['mdp'], PASSWORD_DEFAULT), PDO::PARAM_STR);
    $q->execute();
    header('location:adm.php');
    exit;
} 
    
    if(isset($_POST['valider']))
    {
        $q = $db->prepare('UPDATE parametres SET evenement = :evenement, slogan = :slogan, mdp = :mdp WHERE id = 1');
        $q->bindValue(':evenement', $_POST['evenement'], PDO::PARAM_STR);
        $q->bindValue(':slogan', $_POST['slogan'], PDO::PARAM_STR);
        $q->bindValue(':mdp', $_POST['mdp'], PDO::PARAM_STR);
        $q->execute();
        header('location:adm.php');
        exit;
    } 
    }
    if(isset($_GET['Data']))
    {
    $mediaCount=$db->query('SELECT COUNT(*) FROM media')->fetchColumn();
    if($mediaCount>1){
        $qMedias =$db->query('SELECT * FROM media');
        $datas = $qMedias->fetchAll(PDO::FETCH_ASSOC);
         echo'<div class="col-lg-offset-3 col-lg-6 col-md-offset-2 col-md-8 col-xs-12"><br>';
    foreach ($datas as $key => $value){
                    //$str .= "<span class='resume'>";
                    //$chemin = 'vignette/'.$value['newName'];
                    //$str=$str."<img src='$chemin' class='vignette' alt='vignette'/>\n";
                    //echo"<img src='$chemin' class='vignette text-center' alt='vignette'/><br><br>";
                    //echo'<div class="col-lg-offset-2 col-lg-8 col-md-offset-2 col-md-8 col-xs-12">';
                    echo '<ul class="list-group">';
                    echo '<a href="#" class="list-group-item">';
                    echo "<p class='list-group-item-text pull-right'>".$value['newName']."</p>";
                    $chemin = 'contenu/vignette/'.$value['newName'];
                    echo"<img src='$chemin'>";
                    echo '</a>';
                    echo '</ul>';
                    //$str.="Pseudo : ".$value['pseudo']."<br/>\n";
                    //$str.="Description : ".$value['pseudo']."<br/>\n";
                    //$str.="Date ajout : ".$value['timestamp']."<br/>\n";
      //$str.="</span>\n";
                }
            }else{
              echo "Aucun résultat";
            }
        

    }
    }
      else 
    {

    echo '<div id="main-container" class="container-fluid">';
    echo '<div class="text-center"><h1><a href="index.php" class="heading">Snap Snap Spot !</a></h1></div>';
    echo '<h3 class="heading text-center">Connexion</h3>';
    echo '<div class="row">';
    echo '<div class="col-lg-offset-4 col-lg-4 col-md-offset-2 col-md-8 col-xs-12"></div></div>';
    echo "<form action='' class='row' method='post'>";
    echo '<div class="col-lg-offset-4 col-lg-4 col-md-offset-2 col-md-8 col-xs-12">';
    echo "<label for='password'>Mot de passe</label><br>";
    echo '<div class="input-group">';
    echo "<input id='password' class='form-control' type='password' name='mdp' value='' required>";
    echo '<div class="input-group-btn">';
    echo '<input class="btn btn-primary" type="submit" name="ok" value="Valider"></div></div></div>';
    echo '</form>';

    if(isset($_POST['ok']))
    {

   if(password_verify($_POST['mdp'],$dataParam['mdp']))
    {
    $_SESSION['login']   = 'admin'; 
    header('location:adm.php');
    }
    else
    {
     echo '<h3 class="text-center">Mauvais mot de passe !</h3>'; 
    } 
    }
    }
?>
        
		<footer class="text-center">
		  <p>&copy;2017 - David Fournier&nbsp;&amp;&nbsp;Olivier Welter.</p>
        </footer>

    <script type="text/javascript" src="js/jquery-3.2.1.js" ></script>
    <script type="text/javascript" src="js/snapspotAdm.js" ></script>
	</body>
</html>
