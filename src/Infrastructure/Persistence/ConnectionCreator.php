<?php

declare(strict_types=1);

namespace Biraneves\Revvo\Infrastructure\Persistence;

use PDO;

/**
 * Class ConnectionCreator
 * 
 * Responsible for creating and configuring a PDO connection to the database.
 * 
 * @package Biraneves\Revvo\Infrastructure\Persistence
 */
class ConnectionCreator {

    /**
     * Creates and returns a PDO connection to the database
     * 
     * @return PDO The configured PDO connection.
     */
    public static function createConnection() : PDO {
        $databasePath = __DIR__ . '/../../../database.sqlite';
        $connection = new PDO('sqlite:' . $databasePath);
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

        return $connection;
    }

}