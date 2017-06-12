 <?php
session_start() ;
// AUTOLOAD //
require('php/autoload.php');

 // CONNEXION SQLITE //
$db = new PDO('sqlite:snapspot.sqlite');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING); // On émet une alerte à chaque fois qu'une requête a échoué.

//  CREATION TABLEAU PARAMETRES //
    $qPar = $db->query('SELECT slogan, evenement, mdp FROM parametres WHERE id = 1');
    $donnees = $qPar->fetch(PDO::FETCH_ASSOC);
    



    

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="fr">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>SNAPSPOT</title>
		 <link href="bootstrap/css/bootstrap.css" rel="stylesheet" media="screen">
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
echo '<p id="deco"><a href="?deconnexion=1">Déconnexion</a></p>';
echo '<center><h1><a href="index.php">Snap Snap Spot !</a></h1></center>';

echo "<center><form action='' method='get'>";
echo "<input class='btn' type='submit' name='Appli' value='Appli'>";
echo "<input class='btn' type='submit' name='Data' value='Data'>";
echo '</form></center>'; 

if(isset($_GET['Appli']))
{

    
    ?>
      <div id="main-container" class="container-fluid">
    <div class="text-center"></div>
<h3 class="heading text-center">Administration</h3>

<form action="" id="admin-form" class="row" method="post" enctype="multipart/form-data">
    <div class="col-lg-offset-3 col-lg-6 col-md-offset-2 col-md-8 col-xs-12">
        <br>
        <label for="password">Mot de passe administrateur</label>
        <div class="input-group">
            <input id="mdp" class="form-control" type="password" name="mdp" value="" placeholder="*******"/>
            <div class="input-group-btn">
                <input type="submit" name="change_password" value="Modifier" class="btn btn-primary"/>
            </div>
        </div>
    </div>
    <div class="col-lg-offset-3 col-lg-6 col-md-offset-2 col-md-8 col-xs-12">
        <br>
        <label for="title">Nom de l'événement</label>
        <div class="input-group">
            <?php
 echo "<input id='evenement' class='form-control' type='text' name='evenement' value='".$donnees['evenement']."'/>";
 ?>
            <div class="input-group-btn">
                <input type="submit" name="change_title" value="Modifier" class="btn btn-primary"/>
            </div>
        </div>
    </div>
    <div class="col-lg-offset-3 col-lg-6 col-md-offset-2 col-md-8 col-xs-12">
        <br>
        <label for="message">Slogan</label>
        <div class="input-group">
                       <?php
 echo "<input id='slogan' class='form-control' type='text' name='slogan' value='".$donnees['slogan']."'/>";
 ?>
            <label class="input-group-addon btn btn-primary" for="hidden_submit">Modifier</label>
        </div>
    </div>
    <input class="btn btn-primary" id="hidden_submit" type="submit" value="Modifier"/>
    <div class="col-lg-offset-3 col-lg-6 col-md-offset-2 col-md-8 col-xs-12">
        <br>
        <label for="message">Changer l'image de fond</label>
        <div class="input-group">
            <input type="file" name="file" class="form-control"/>
            <div class="input-group-btn">
                <input class="btn btn-primary" type="submit" name="image_submit" value="Envoyer"/>
                            </div>
        </div>
    </div>
    <form class="form-inline">
  <div class="input-group col-lg-3"> 
    <input type="text" class="form-control" style="text-align:right" value="10 000">
    <span class="input-group-btn">
      <button class="btn btn-default" type="button">Valider</button>
    </span>
  </div>
</form>
    <div class="col-lg-offset-3 col-lg-6 col-md-offset-2 col-md-8 col-xs-12">
        <br>
        <label for>
            Utilisation du disque        </label>
        <div class="row">
                                        <div class="col-xs-12">
                                        <div class="progress text-center"
                         style="text-indent: -89%;">
                        <div class="progress-bar progress-bar-success progress-bar-striped"
                             role="progressbar"
                             aria-valuemin="0" aria-valuemax="100"
                             style="min-width: 2em;width: 89%;">
                        </div>
                        <span>89% / 14.0 Go disponible</span>
                    </div>
                </div>
                    </div>
    </div>
    <div class="col-lg-offset-3 col-lg-6 col-md-offset-2 col-md-8 col-xs-12">
        <br>
        <label for>Nettoyage du disque</label>
        <div class="input-group-btn">
                            <input class="btn btn-primary confirm-delete disabled"
                       type="submit" name="delete_backup_submit"
                       value="Vider les sauvegardes (0)"/>
            <input class="btn btn-primary confirm-delete disabled"
                   type="submit" name="delete_photos_submit"
                   value="Vider les images (0)"/>
        </div>
    </div>
</form>
</div>
<?php
    
    
   /* 
echo "<form action='' method='post' id='adminappli'>"; 
echo "<label class='position'>Nom de l'Evenement:</label><br>";
echo "<input class='position' type='text' name='slogan' value='".$donnees['slogan']."'  />";
echo "<input class='position' type='text' name='evenement' value='".$donnees['evenement']."' />";
echo "<input class='position' type='text' name='mdp' value='".$donnees['mdp']."' /><br>";
echo " <input class='btn position' type='submit' name='valider' value='Valider'/><br>";
echo "</form>";

echo "<form method='post' id='change_fond' action='' enctype='multipart/form-data'>";
echo "<input style='cursor:pointer' class='position' type='file' id='image_fond'  name='image_fond'   />";
echo "</form>";
*/

if (isset($_FILES['image_fond'])){
    //Vérification image uploadée
if ($_FILES['image_fond']['error'] > 0) {
$erreur = "Erreur lors du transfert";
}
    
// ENREGISTREMENT DE L'IMAGE UPLOADEE
move_uploaded_file($_FILES["image_fond"]["tmp_name"], 'css/accueil.jpg');
//header('location:adm.php');
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
    
   
 foreach ($datas as $key => $value){
        
  echo '<ul class="list-group">';
  echo '<a href="#" class="list-group-item">';
  
    echo "<p class='list-group-item-text pull-right'>".$value['newName']."</p>";
          $chemin = 'vignette/'.$value['newName'];
    echo"<img src='$chemin'>";
  echo '</a>';
echo '</ul>';
            }
        }else{
          echo "Aucun résultat";
        }
    

}
}
  else 
{

?>
<form action="" class="row" method="post">
    <div class="col-lg-offset-3 col-lg-6 col-md-offset-2 col-md-8 col-xs-12">
        <label for="password">Mot de passe</label>
        <div class="input-group">
            <input id="password" class="form-control" type="password" name="mdp" value=""/>
            <div class="input-group-btn">
                <input type="submit" name='ok' value="Se connecter" class="btn btn-primary"/>
            </div>
        </div>
    </div>
</form>  
<?php

if(isset($_POST['ok']))
{

if($_POST['mdp']==$donnees['mdp'])
{
$_SESSION['login']   = 'admin'; 
header('location:adm.php');
}
else
{
 echo 'Mauvais mot de passe !'; 
} 
}
}
?>         
 <footer class="navbar-fixed-bottom container-fluid text-center" >
    <p>&copy;2017 - David Fournier&nbsp;&amp;&nbsp;Olivier Welter.</p>
</footer>
<script type="text/javascript" src="js/jquery.js" ></script>
<script type="text/javascript" src="js/snapspotAdm.js" ></script>
        </body>
</html>
  