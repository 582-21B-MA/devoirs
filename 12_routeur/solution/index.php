<?php

require "router.php";
require "handlers.php";

$router = new_router();
$router["add_route"]("GET", "/books", $handler_books);
$router["add_route"]("GET", "/api/books", $handler_api_books);
$router["add_route"]("POST", "/books/add", $handler_add_book_post);
$router["dispatch"]();
