<?php
if ($_FILES['mon_fichier']['error'] > 0) $erreur = "Erreur lors du transfert";

//if ($_FILES['mon_fichier']['size'] > $maxsize) $erreur = "Le fichier est trop gros";

$extensions_valides = array( 'jpg' , 'jpeg' , 'gif' , 'png' );
//1. strrchr renvoie l'extension avec le point (« . »).
//2. substr(chaine,1) ignore le premier caractère de chaine.
//3. strtolower met l'extension en minuscules.
$extension_upload = strtolower(  substr(  strrchr($_FILES['mon_fichier']['name'], '.')  ,1)  );
if ( in_array($extension_upload,$extensions_valides) ) echo "Extension correcte";


$file_size = $_FILES['mon_fichier']['size'];
//if ($file_size[0] > $maxwidth OR $file_size[1] > $maxheight) $erreur = "Image trop grande";


//Créer un identifiant difficile à deviner
  $new_name = md5(uniqid(rand(), true)).'.'.$extension_upload;

//répertoire stockage photos
$chemin='image/';

$resultat = move_uploaded_file($_FILES['mon_fichier']['tmp_name'],$chemin.$new_name);
if ($resultat) echo "Transfert reussi";

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