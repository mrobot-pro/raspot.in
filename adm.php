 <?php
 // CONNEXION SQLITE //
$db = new PDO('sqlite:snapspot.sqlite');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING); // On émet une alerte à chaque fois qu'une requête a échoué.

//  NOUVELLE INSTANCE DE LA CLASS PARAMETRES = OBJET $parametres //
    $q = $db->query('SELECT slogan, evenement, mdp FROM parametre WHERE id = 1');
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


<center>
   <form action='adm.php' method='post'>
     <label>Mot de passe</label><input type='password' name='mdp' value='' required>
     <input class='btn' type='submit' value='Valider'>
   </form>   
</center>

<?php
if(isset($_POST['mdp']))
{
    if($_POST['mdp']==$donnees['mdp'])
    {

echo '<center><ul id="menu_horizontal">
<li class="btn" ><a href="adm.php?page=appli">Appli</a></li>
<li class="btn" ><a href="adm.php?page=data">Data</a></li>
</ul></center>';
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
