<?php

declare(strict_types=1);
require "films.php";
require "helpers.php";

function main(array $argv): void
{
    $db = create_database();
    $action = $argv[1];
    if ($action === "add") {
        $title = $argv[2];
        $director = $argv[3];
        add_film($db, $title, $director);
    }
    if ($action === "all") {
        $films = get_films($db);
        echo stringify($films);
    }
}

main($argv);
