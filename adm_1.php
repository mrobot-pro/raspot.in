<?php

session_start();
require 'controller/AdminMenuController.php';
require 'controller/AdminAppliController.php';
require 'model/Media.php';
$menu = new AdminMenuController();
$menu->adminmenu();
$appli= new AdminAppliController();
$appli->adminappli();