<?php

declare(strict_types=1);

$databasePath = __DIR__ . '/database.sqlite';
$pdo = new PDO('sqlite:' . $databasePath);

$sql = '
    INSERT INTO courses (
        title,
        description,
        image,
        link_slideshow,
        created_at
    ) VALUES (
        "Curso de PHP",
        "Curso completo de PHP para iniciantes em programação",
        "https://cdn.prod.website-files.com/5f7f727db3e6f13ab3aee8a6/618ee653e0d36f7036f433b0_590300.jpeg",
        "https://www.redsharkdigital.com/news/php-first-programming-language",
        "2021-01-01"
    );
';
$pdo->exec($sql);
