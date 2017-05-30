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
<input type="file" id="mon_fichier"  name="mon_fichier" style="display:none"  />
</form>

<?php
if (isset($_FILES['mon_fichier'])){
//Vérification image uploadée
if ($_FILES['mon_fichier']['error'] > 0) $erreur = "Erreur lors du transfert";
//if ($_FILES['mon_fichier']['size'] > $maxsize) $erreur = "Le fichier est trop gros";
//if ($file_size[0] > $maxwidth OR $file_size[1] > $maxheight) $erreur = "Image trop grande";

//Initialisation variables

$vign_path='vignette/';//répertoire stockage vignette
$chemin='image/';//répertoire stockage photos
$uploadedfile 	= 	$_FILES['mon_fichier']['tmp_name'];
$file_size = $_FILES['mon_fichier']['size'];
$filename		=	$_FILES["mon_fichier"]["name"];
$extensions_valides = array( 'jpg' , 'jpeg' );

function getExtension($str) 
{
         $i = strrpos($str,".");
         if (!$i) { return ""; } 
         $l = strlen($str) - $i;
         $ext = substr($str,$i+1,$l);
         return $ext;
}

//recup extension
$extension_upload 	= 	getExtension($filename);
//mise en minuscule extension
$extension_upload 	= 	strtolower($extension_upload);

//Test de l'extension
//if ( in_array($extension_upload,$extensions_valides) ) echo "Extension correcte";




//Créer un identifiant difficile à deviner
  $new_name = md5(uniqid(rand(), true)).'.'.$extension_upload;

$resultat = move_uploaded_file($uploadedfile,$chemin.$new_name);
//if ($resultat) echo "Transfert reussi";

//Création miniature
$src = 	imagecreatefromjpeg($chemin.$new_name);
list($width,$height)	=	getimagesize($chemin.$new_name);

			$newheight	=	100;
			$newwidth	=	($width/$height)*$newheight;
			$tmp		=	imagecreatetruecolor($newwidth,$newheight);
			imagecopyresampled($tmp, $src, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
			$vigname 	= 	$vign_path.$new_name;
			imagejpeg($tmp,$vigname,100);
			imagedestroy($src);
			imagedestroy($tmp);
			
			
			
			
			
//connexion a la base 
  try {
// Nouvel objet de base SQLite 
   $base = new PDO('sqlite:snapspot.sqlite');
// Quelques options
   $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
   die('Erreur : '.$e->getMessage());
}

 $pseudo=$_POST['pseudo'];
 $commentaire=$_POST['commentaire'];
 
// On prépare la requête
$req = $base->prepare('INSERT INTO media ( pseudo, commentaire, chemin, new_name, old_name, file_size ) VALUES (?,?,?,?,?,?)');

// On l’éxécute.
$req->execute(array($pseudo, $commentaire,$chemin,$new_name,$filename,$file_size));

unset ($base);
}
?>

<div>
	<p>Partagez vos photos </p>
	<p>sur ce spot </p>
	<p>tout au long de l'événement !</p>
</div></center>


<center><h1>BONJOUR</h1></center>



        <footer>
            <center>
		<p>&copy;2017 - David Fournier&nbsp;&amp;&nbsp;Olivier Welter.</p>
            </center>
        </footer>
    </body>
</html>

    	<script type="text/javascript" src="js/jquery-3.2.1.js" ></script>
	<script type="text/javascript" src="js/snapspot.js" ></script>

</body>
</html>
