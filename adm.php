<?php

include('./php/includes/heading.php');

include('./php/includes/header.php');

//gestion mot de passe
echo '<form action="adminmenu.php" method="post">';
	echo '<center><label>Mot de Passe</label><br>';
	echo	'<input type="password" name="mdp" required/><br>';
    echo    '<input class="btn" type="submit" value="Valider"/></center>';
echo '</form>';

include('./php/includes/footer.php');
