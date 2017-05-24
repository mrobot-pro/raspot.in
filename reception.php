<?php

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
$extensions_valides = array( 'jpg' , 'jpeg' , 'gif' , 'png' );

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
if ( in_array($extension_upload,$extensions_valides) ) echo "Extension correcte";

//Créer un identifiant difficile à deviner
  $new_name = md5(uniqid(rand(), true)).'.'.$extension_upload;



$resultat = move_uploaded_file($uploadedfile,$chemin.$new_name);
if ($resultat) echo "Transfert reussi";

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
			echo "<img src='{$vigname}'/>";
//connexion a la base 
  try {
// Nouvel objet de base SQLite 
   $base = new PDO('sqlite:snapspot.sqlite');
// Quelques options
   $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
   die('Erreur : '.$e->getMessage());
}
 $old_name=$_FILES['mon_fichier']['name'];
 $pseudo=$_POST['pseudo'];
 $commentaire=$_POST['commentaire'];
 
// On prépare la requête
$req = $base->prepare('INSERT INTO media ( pseudo, commentaire, chemin, new_name, old_name, file_size ) VALUES (?,?,?,?,?,?)');

// On l’éxécute.
$req->execute(array($pseudo, $commentaire,$chemin,$new_name,$old_name,$file_size));

unset ($base);