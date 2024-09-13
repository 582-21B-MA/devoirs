<?php

function new_router(): array
{
    $routes = [];

    $add_route = function (string $verb, string $path, callable $handler) use (
        &$routes
    ): void {
        $routes[$verb][$path] = $handler;
    };

    $match_route = function (string $verb, string $path) use (
        &$routes
    ): callable|null {
        $method_is_unknown = !array_key_exists($verb, $routes);
        $path_is_unknown =
            $method_is_unknown || !array_key_exists($path, $routes[$verb]);
        if ($path_is_unknown) {
            return null;
        }
        return $routes[$verb][$path];
    };

    $not_found = function (): string {
        http_response_code(404);
        return "Not Found";
    };

    $dispatch = function () use ($match_route, $not_found): void {
        $handler = $match_route(
            $_SERVER["REQUEST_METHOD"],
            $_SERVER["REQUEST_URI"]
        );
        if ($handler === null) {
            $handler = $not_found;
        }
        echo $handler();
    };

    return [
        "add_route" => $add_route,
        "dispatch" => $dispatch,
    ];
}
