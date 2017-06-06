<?php

	class Admin
{

    public function __construct()
    {
        
    }

    public function accueil()
    {
        echo '<form action="" method="post">
                <center><label>Mot de Passe</label><br>
                    <input type="password" name="mdp" required/><br>
                    <input class="btn" type="submit" value="Valider"/></center>
                </form>';
        if ($_POST['mdp'] == "admin")
        {
            echo '<center><ul id="menu_horizontal">';
            echo '<li class="btn" ><a href="adm.php?page=adminappli.php">Appli</a></li>';
            echo '<li class="btn" ><a href="admindata.php">Data</a></li>';
            echo '</ul></center>';
        }

    }

}
