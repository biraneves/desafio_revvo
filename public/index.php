<?php

declare(strict_types=1);

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

// TODO: routes and controller logic
