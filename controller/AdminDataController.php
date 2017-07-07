<?php

require_once 'autoload.php';

class AdminDataController
{

    // Affiche la liste de tous les billets du blog
    public function admindata()
    {

        $vue = new ViewAdmin("AdminData");
        $vue->generer(array());
    }

}
