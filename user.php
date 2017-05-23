<?php

//Affiche les bases dispos
echo '<h3>Bases disponibles</h3>';
foreach (PDO::getAvailableDrivers() as $pdo_driver) {
    echo 'disponible: '.$pdo_driver . "<br/>";
}
/* Connexion à la base */
$dbh=new PDO("sqlite:snapspot.sqlite");
echo '<h3>Tables user</h3>';
/* requete sql */
$res = $dbh->query("SELECT * 
FROM user");

/* boucle d'affichage users */
if ($res != false){ 
        while($row = $res->fetch()){
            echo $row['user_id'].' '.$row['nom'].' '.$row['prenom']."<br/>";
        }
} else{
        echo "erreur de connexion";
}

echo '<h3>Tables media</h3>';
/* requete sql */
$res = $dbh->query("SELECT * 
FROM media");

/* boucle d'affichage medias */
if ($res != false){ 
        while($row = $res->fetch()){
			$src=$row['chemin'].$row['new_name'];
            echo $row['media_id'].' '.$src.' '.$row['commentaire']."<br/>".'<a href="'.$src.'"><img src="'.$src.'" height="100"></a>'."<br/>";
        }
} else{
        echo "erreur de connexion";
}

/* Fermeture de la connexion */
unset($dbh);