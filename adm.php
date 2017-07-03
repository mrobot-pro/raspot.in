<?php

session_start();
require 'autoload.php';

$routeur = new Router();
$routeur->administration();
