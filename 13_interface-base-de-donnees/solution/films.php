<?php

declare(strict_types=1);

function create_database(): SQLite3
{
    $db = new SQLite3("db.sqlite");
    $db->exec("
        CREATE TABLE IF NOT EXISTS Films (
            id INTEGER PRIMARY KEY,
            title TEXT,
            director TEXT
        )
    ");
    return $db;
}

function add_film(SQLite3 $db, string $title, string $director): void
{
    $stmt = $db->prepare("
        INSERT INTO Films (title, director)
        VALUES (:title, :director)
    ");
    $stmt->bindValue(":title", $title);
    $stmt->bindValue(":director", $director);
    $stmt->execute();
}

function get_films(SQLite3 $db): array
{
    $stmt = $db->prepare("
        SELECT title, director
        FROM Films
        ORDER BY title
    ");
    $res = $stmt->execute();
    $films = [];
    while ($f = $res->fetchArray(SQLITE3_ASSOC)) {
        array_push($films, $f);
    }
    return $films;
}
