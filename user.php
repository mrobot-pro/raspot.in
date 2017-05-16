<?php



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

/* Fermeture de la connexion */
unset($dbh);