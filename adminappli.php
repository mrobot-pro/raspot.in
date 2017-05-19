<?php

if(isset($_POST['mdp']) AND ($_POST['mdp'] == "admin")) {
	
include('./php/includes/heading.php');

include('./php/includes/header.php');

echo '
<form action="" method="post">
	 <center>
	 	<label>Nom de l\'Evenement:</label><br>
			<input type="text" name="evenement" placeholder="Evenement..." />
       		<input type="submit" value="Valider"/><br>
       	<label>Message d\'Explication:</label><br>
       		<input type="text" name="explication" placeholder="Slogan..." />
       		<input type="submit" value="Valider"/><br>
       	<label>Changer de Mot de Passe:</label><br>
       		<input type="password" name="password" placeholder="********" />
       		<input type="submit" value="Valider"/><br>
       	<label>Changer Image de Fond:</label><br>
        	<input type="file" name="imagefond" />
        	<input type="submit" value="Valider"/><br>
       	<label>Taille Maximale des Photos:</label><br>
       		<input type="number" name="taillemaxphoto" min="0" max="20" placeholder="En MegaOctet..." />
       		<input type="submit" value="Valider"/><br>
       	<p>Utilisation du Disque Principal:<br>
       		<progress id="avancement" value="50" max="100"></progress>
		</p>
</form>
';

include('./php/includes/footer.php');

}

else {
    include('./php/includes/heading.php');
    include('./php/includes/header.php');
    echo'<center><p>Mot de Passe non reconnu <br>Veuillez contacter <br>l\'Administrateur !</p></center>';
    include('./php/includes/footer.php');
}
