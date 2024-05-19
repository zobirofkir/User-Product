<?php

use Config\Config;
use Config\Connection;
use Controller\ProductController;
use Controller\UserController;
use Route\Routes;

error_reporting(E_ALL);
ini_set('display_errors', 1);
header('Content-Type: application/json; charset=utf-8');

require_once __DIR__ . "/vendor/autoload.php";

$handleRoutes = new Routes();
$handleRoutes->handleRoutes();
