<?php

/**
 * Crée un nouveau routeur.
 */
function new_router(): array
{
    $routes = [];

    /**
     * Enregistre une nouvelle route auprès du routeur. Le $handler est
     * appelé si une requête est reçue dont la méthode et le chemin
     * correspond à $verb et $path.
     */
    $add_route = function (string $verb, string $path, callable $handler) use (
        &$routes
    ): void {
        $routes[$verb][$path] = $handler;
    };

    /**
     * Retourne le gestionnaire qui correspond à $verb et $path. Si
     * aucun gestionnaire est trouvé, retourne null.
     */
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

    /**
     * Gestionnaire qui avise le client que la ressource demandée est
     * introuvable.
     */
    $not_found = function (): string {
        http_response_code(404);
        return "Not Found";
    };

    /**
     * Expédie la réponse au client. Cette fonction doit absolument être
     * appelée après avoir enregistré les routes.
     */
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
