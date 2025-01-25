<?php

declare(strict_types=1);

$databasePath = __DIR__ . '/database.sqlite';
$pdo = new PDO('sqlite:' . $databasePath);

$sql = '
    DELETE FROM courses WHERE id = 3 OR id = 4;
';
$pdo->exec($sql);
