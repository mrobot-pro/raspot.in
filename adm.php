 <?php
session_start() ;
echo var_dump($_SESSION);
 // CONNEXION SQLITE //
$db = new PDO('sqlite:snapspot.sqlite');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING); // On émet une alerte à chaque fois qu'une requête a échoué.

//  NOUVELLE INSTANCE DE LA CLASS PARAMETRES = OBJET $parametres //
    $q = $db->query('SELECT slogan, evenement, mdp FROM parametres WHERE id = 1');
    $donnees = $q->fetch(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="fr">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>SNAPSPOT</title>
		<link rel="stylesheet" href="./css/default.css" title = "default">
	</head>

	<body>
		
		<!-- <center><img src="./image/favicon.png" alt="logo_appli" /></center> -->


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
echo var_dump($_FILES);

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
echo $db->query('SELECT COUNT(*) FROM media')->fetchColumn();
}
}
  else 
{
echo '<center><h1><a href="index.php">Snap Snap Spot !</a></h1></center>';
echo '<center>';
echo "<form action='' method='post'>";
echo "<label>Mot de passe</label><input type='password' name='mdp' value='' required>";
echo "<input class='btn' type='submit' name='ok' value='Valider'>";
echo '</form>';   
echo '</center>';

if(isset($_POST['ok']))
{
echo var_dump($_SESSION);
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

		<footer>
            <center>
		<p>&copy;2017 - David Fournier&nbsp;&amp;&nbsp;Olivier Welter.</p>
            </center>
        </footer>
  <script type="text/javascript" src="js/jquery-3.2.1.js" ></script>
  <script type="text/javascript" src="js/snapspotAdm.js" ></script>
	</body>
</html>
  