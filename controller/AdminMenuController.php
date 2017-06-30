<?php

require_once 'view/ViewAdmin.php';

class AdminMenuController {

    // Affiche la liste de tous les billets du blog
    public function adminmenu() {

        $vue = new ViewAdmin("Administration");
        $vue->generer(array());
    }

}
