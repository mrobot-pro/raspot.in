 <?php
     session_start() ;
      var_dump($_SESSION);
        var_dump($_POST);
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

		<header>
		<center><h1><a href="index.php">Snap Snap Spot !</a></h1></center>
		<!-- <center><img src="./image/favicon.png" alt="logo_appli" /></center> -->
		</header>

		<h1>TITRE EVENEMENT</h1>

<?php

if($_SESSION['login'] !== 'admin')
{
echo '<center>';
  echo "<form action='adm.php' method='post'>";
     echo "<label>Mot de passe</label><input type='password' name='mdp' value='' required>";
     echo "<input class='btn' type='submit' value='Valider'>";
   echo '</form>';   
echo '</center>';
}

 else {
     
 echo '<center><ul id="menu_horizontal">
<li class="btn" ><a href="adm.php?page=appli">Appli</a></li>
<li class="btn" ><a href="adm.php?page=data">Data</a></li>
 <form action="" method="post" id="adminappli"> 
                <label class="position">Nom de l\'Evenement:</label><br>';
echo "<input class='position' type='text' name='slogan' value='".$donnees['slogan']."'  />";
  echo "<input class='position' type='text' name='evenement' value='".$donnees['evenement']."' />";
 echo "<input class='position' type='text' name='mdp' value='".$donnees['mdp']."' />";
  echo " <input class='btn' type='submit' value='Valider'/><br>";
  echo '</form>';
echo '</ul></center>';

if(isset($_POST))
{
    $q = $db->prepare('UPDATE parametres SET evenement = :evenement, slogan = :slogan, mdp = :mdp WHERE id = 1');
    $q->bindValue(':evenement', $_POST['evenement'], PDO::PARAM_STR);
    $q->bindValue(':slogan', $_POST['slogan'], PDO::PARAM_STR);
    $q->bindValue(':mdp', $_POST['mdp'], PDO::PARAM_STR);
    $q->execute();
}

 }
 
if(isset($_POST['mdp']))
{
    if($_POST['mdp']==$donnees['mdp'])
    {
        $_SESSION['login']   = 'admin';
}
    else
    {
 echo 'Mauvais mot de passe !';
        
    }
}
?>

		<footer>
            <center>
		<p>&copy;2017 - David Fournier&nbsp;&amp;&nbsp;Olivier Welter.</p>
            </center>
        </footer>
	</body>
</html>
