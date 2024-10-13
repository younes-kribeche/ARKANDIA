<?php
require_once __DIR__ . '/../vendor/autoload.php';

use App\Router;

// Créer une instance du routeur
$router = new Router();

// Obtenir l'URL demandée
$requestUri = $_SERVER['REQUEST_URI'];

// Gérer la demande
$router->handleRequest($requestUri);

