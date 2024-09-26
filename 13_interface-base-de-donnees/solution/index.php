<?php

declare(strict_types=1);
require "films.php";
require "router.php";
require "helpers.php";

function add_film_handler(SQLite3 $db): callable
{
    return function () use ($db) {
        $title = $_POST["title"];
        $director = $_POST["director"];
        add_film($db, $title, $director);
        http_response_code(201);
    };
}

function get_films_handler(SQLite3 $db): callable
{
    return function () use ($db) {
        $films = get_films($db);
        return stringify($films);
    };
}

function main(): void
{
    $db = create_database();
    $router = new_router();
    $router["add_route"]("POST", "/film/add", add_film_handler($db));
    $router["add_route"]("GET", "/films", get_films_handler($db));
    $router["dispatch"]();
}

main();
