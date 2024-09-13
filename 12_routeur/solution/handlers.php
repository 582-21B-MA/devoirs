<?php

require "books.php";

$handler_books = function () {
    $books = get_books();
    $res = "<dl>";
    foreach ($books as $b) {
        $title = $b["title"];
        $year = $b["year"];
        $res .= "<dt>Titre</dt><dd>$title</dd>";
        $res .= "<dt>Année de publication</dt><dd>$year</dd>";
    }
    return $res . "</dl>";
};

$handler_api_books = function () {
    header("Content-type: application/json");
    return get_books_json();
};

$handler_add_book_post = function () {
    $title = $_POST["title"];
    $year = $_POST["year"];
    error_log("PING");
    add_book($title, $year);
    header("Location: /books");
    http_response_code(303);
};
