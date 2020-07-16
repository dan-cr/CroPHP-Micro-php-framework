<?php

namespace Crodev\Core;

use Crodev\Core\Utilities\Url\UrlHelper;

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
     * @param string $method
     * @param array $operation
     * @return void
     */
    public static function addRoute(string $expression, string $method, array $operation): void {

        // Destructure assoc array into individual parts
        ['handler' => $handler, 'action' => $action] = $operation;

        // Append new route to routes array
        self::$routes[] = [
            'path' => $expression,
            'method' => $method,
            'handler' => $handler,
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
        $indexes = [];
        $path = UrlHelper::getNonEmptyPathSegmentsAsArray($route['path']);
        foreach($path as $key => $segment) {
            if (strpos($segment, ':') === 0) {
                $indexes[$segment] = ($key-1);
            }
        }
        return $indexes;
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
                $parameterCount = count(UrlHelper::getNonEmptyPathSegmentsAsArray($route['path']));
                if (count($tempPath) === $parameterCount) {
                    $variablesIndexes = Router::getRouteVariableIndexes(($route));
                    if (!empty($variablesIndexes)) {
                        foreach($variablesIndexes as $key => $index) {
                            $tempPath[$index+1] = $key;
                        }
                    }
                    $fullPath = ($parameterCount === 0) ? '/' : '/' . implode('/', $tempPath) . '/';
                    if ($route['path'] === $fullPath) {
                        if (Request::getRequestMethod() === $route['method']) {
                            // The route matches after substitution, so dispatch it
                            return $route;
                        } else {
                            var_export('METHOD NOT ALLOWED');
                        }
                    }
                }
            }
        }
        return null;
    }

}