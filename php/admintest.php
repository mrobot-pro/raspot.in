<?php

	class Admin
{

    public function __construct()
    {
        
    }

    public static function accueil()
    {
        echo '<form action="adm.php" method="post">
                <center><label>Mot de Passe</label><br>
                    <input type="password" name="mdp" required/><br>
                    <input class="btn" type="submit" value="Valider"/></center>
                </form>';

    }

    public static function menu()
    {

        echo '  <nav>
                    <ul class="top-menu">
                        <li><a href="#">Accueil</a><div class="menu-item" id="item1"></div></li>
                        <li><a href="#">Appli</a><div class="menu-item" id="item2"></div></li>
                        <li><a href="#">Data</a><div class="menu-item" id="item3"></div></li>
                    </ul>
                </nav>

                <div id="appli">
                    <form action="index.php" method="post">
       
                            <label class="position">Nom de l\'Evenement:</label><br>
                                    <input class="position" type="text" name="evenement" placeholder="Evenement..." />
                                    <input class="btn" type="submit" value="Valider"/><br>
                            <label class="position">Message d\'Explication:</label><br>
                                    <input class="position" type="text" name="slogan" placeholder="Slogan..." />
                                    <input class="btn" type="submit" value="Valider"/><br>
                            <label class="position">Changer de Mot de Passe:</label><br>
                                    <input class="position" type="password" name="password" placeholder="********" />
                                    <input class="btn" type="submit" value="Valider"/><br>
                            <label class="position">Changer Image de Fond:</label><br>
                                    <input class="position" type="file" name="imagefond" />
                                    <input class="btn" type="submit" value="Valider"/><br>
                            <label class="position">Taille Maximale des Photos:</label><br>
                                    <input class="position" type="number" name="taillemaxphoto" min="0" max="20" placeholder="En MegaOctet..." />
                                    <input class="btn" type="submit" value="Valider"/><br>
                            <p class="position">Utilisation du Disque Principal:<br>
                                    <progress  class="position" id="avancement" value="50" max="100"></progress>
                                    </p>
                            
                    </form>
                </div>

                ';

        
    }

}
