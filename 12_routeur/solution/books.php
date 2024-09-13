<?php

function add_book(string $title, int $year): void
{
    $books = get_books();
    array_push($books, ["title" => $title, "year" => $year]);
    usort($books, function (array $a, array $b): int {
        $order = $a["year"] < $b["year"] ? -1 : 1;
        return $order;
    });
    file_put_contents("books.json", json_encode($books));
}

function get_books(): array
{
    $json = file_get_contents("books.json");
    $books = json_decode($json, true);
    return $books;
}

function get_books_json(): string
{
    $books = get_books();
    return json_encode($books);
}
