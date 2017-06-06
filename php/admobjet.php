<?php

$adm = new Adm($form);

$form = echo '<form action="adm.php" method="post">;
				<center><label>Mot de Passe</label><br>;
					<input type="password" name="mdp" required/><br>;
    				<input class="btn" type="submit" value="Valider"/></center>;
				</form>';

echo $form;
