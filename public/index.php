<?php

declare(strict_types=1);

use Biraneves\Revvo\Controllers\Error404Controller;
use Biraneves\Revvo\Infrastructure\{
    Persistence\ConnectionCreator,
    Repositories\PdoCourseRepository,
};

// Autoload dependencies using Composer
require_once __DIR__ . '/../vendor/autoload.php';

// Create a PDO connection to the database
$pdo = ConnectionCreator::createConnection();

// Instantiate the course repository with the PDO connection
$courseRepository = new PdoCourseRepository($pdo);

// Routes and controller logic
$routes = require_once __DIR__ . '/../src/Config/routes.php';

$httpMethod = $_SERVER['REQUEST_METHOD'];
$pathInfo = $_SERVER['PATH_INFO'] ?? '/';

$routeKey = "$httpMethod|$pathInfo";
if (array_key_exists($routeKey, $routes)) {
    $controller = new $routes[$routeKey]($courseRepository);
} else {
    $controller = new Error404Controller();
}

$controller->processRequest();
