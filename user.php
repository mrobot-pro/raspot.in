<?php

//Affiche les bases dispos
echo '<h3>Bases disponibles</h3>';
foreach (PDO::getAvailableDrivers() as $pro_driver) {
    echo 'disponible: '.$pro_driver . "<br/>";
}
echo '<h3>Tables user</h3>';
$dbh=new PDO("sqlite:snapspot.sqlite");
/* Vérification de la connexion */

$res = $dbh->query("SELECT * 
FROM user");

if ($res != false){ 

        while($row = $res->fetch()){
            echo $row['user_id'].' '.$row['nom'].' '.$row['prenom']."<br/>";
			
        }
		
} else{
        echo "erreur de connexion";
}


echo '<h3>Tables media</h3>';
$dbh=new PDO("sqlite:snapspot.sqlite");
/* Vérification de la connexion */

$res = $dbh->query("SELECT * 
FROM media");

if ($res != false){ 

        while($row = $res->fetch()){
            echo $row['media_id'].' '.$row['chemin'].' '.$row['description']."<br/>";
        }
} else{
        echo "erreur de connexion";
}


/* Fermeture de la connexion */
unset($dbh);