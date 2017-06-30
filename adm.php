<?php

session_start();
require 'controller/Router.php';

$routeur = new Router();
$routeur->administration();
