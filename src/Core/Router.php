<?php

namespace Crodev\Core;

class Router {

    /**
     * Contains all of our applications routes
     *
     * @var array
     */
    private static $routes = [];


    /**
     * Appends a new route to the routes array
     *
     * @param string $expression
     * @param array $controller
     * @return void
     */
    public static function addRoute(string $expression, string $verb, array $operation): void {

        // Destructure assoc array into individual parts
        ['controller' => $controller, 'action' => $action] = $operation;

        // Append new route to routes array
        self::$routes[] = [
            'path' => $expression,
            'verb' => $verb,
            'controller' => $controller,
            'action' => $action
        ];
    }

    /**
     * Retrieve all routes
     * @return array
     */
    public static function getRoutes(): array {
        return self::$routes;
    }

    /**
     * Retrieve variable position (index) which we will use for route pattern matching
     * @param array $route
     * @return array
     */
    public static function getRouteVariableIndexes($route): array {
        $position = [];
        $parts = array_filter(
            preg_split("#/#", $route['path'])
        );
        foreach($parts as $key => $part) {
            if (strpos($part, ':') === 0) {
                $position[$part] = ($key-1);
            }
        }
        return $position;
    }

    /**
     * Compare the current path from the REQUEST_URI and see if there is a match found in Routes config file
     * @param array $routes
     * @param array $path
     * @return mixed array|null
     */
    public static function matchRoute(array $routes, array $path): ?array {
        if ($routes) {
            foreach ($routes as $route) {
                $tempPath = $path;
                $parameterCount = count(array_filter(
                    preg_split("#/#", $route['path'])
                ));
                if (count($tempPath) === $parameterCount) {
                    $variablesIndexes = Router::getRouteVariableIndexes(($route));
                    if (!empty($variablesIndexes)) {
                        foreach($variablesIndexes as $key => $index) {
                            $tempPath[$index+1] = $key;
                        }
                    }
                    $fullPath = ($parameterCount === 0) ? '/' : '/' . implode('/', $tempPath) . '/';
                    if ($route['path'] === $fullPath) {
                        if ($_SERVER['REQUEST_METHOD'] === $route['verb']) {
                            // The route matches after substitution, so dispatch it
                            return $route;
                        } else {
                            var_export('VERB NOT ALLOWED');
                        }
                    }
                }
            }
        }
        return null;
    }

}