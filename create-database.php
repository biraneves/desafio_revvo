<?php

declare(strict_types=1);

$databasePath = __DIR__ . '/database.sqlite';
$pdo = new PDO('sqlite:' . $databasePath);

$sql = '
    CREATE TABLE courses (
        id INTEGER PRIMARY KEY,
        title TEXT,
        description TEXT,
        image TEXT,
        link_slideshow TEXT,
        created_at TEXT
    );
';
$pdo->exec($sql);
