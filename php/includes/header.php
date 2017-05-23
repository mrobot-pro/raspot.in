<?php

require_once('php/autoload.php');
$s = Session::getInstance();
$s->setMaxAge(10000); 
$s->start();
$a = Authentification::getInstance();
$s->getRemainingTime();

echo session_id();
echo '<br>';
echo session_cache_expire();

echo '<header>';
echo '<center><h1><a href="index.php">Snap Snap Spot !</a></h1></center>';
echo '<center><img src="./image/favicon.png" alt="logo_appli" /></center>';
echo '</header>';
