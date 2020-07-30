<?php

use Crodev\Core\Router;
use Crodev\Core\Request;
use Crodev\Core\Dispatcher;
use Crodev\Core\Utilities\Url\UrlHelper;

// PSR-4 Autoloading
require_once __DIR__ . '/../../vendor/autoload.php';

// Application Constants
require_once __DIR__ . '/../Config/Constants.php';

// Load core framework modules
$router = new Router();
$dispatcher = new Dispatcher();
$request = new Request();

// Application Routes
require_once BASE_URL . '/Config/Routes.php';

// Retrieves all user specified routes in Routes.php
$routes = $router->getRoutes();

// Retrieve current path in segments using as array
$path = UrlHelper::getNonEmptyPathSegmentsAsArray($request->getPath());

// Check if current path matches a specified route in config
$matchedRoute = $router->matchRoute($routes, $path);

try {
    // Dispatch request if found, otherwise display 404
    if ($matchedRoute) {
        $data = [];
        $indexes = $router->getRouteVariableIndexes($matchedRoute);
        if ($indexes) {
            foreach($indexes as $var => $value) {
                $variable = substr($var, 1);
                $data[$variable] = $path[$value + 1];
            }
        }
        $dispatcher->execute($matchedRoute['handler'], $matchedRoute['action'], $data);
    } else {
        $dispatcher->execute('error', 'notFound');
    }
} catch (\Exception $e) {
    $dispatcher->execute('error', 'generic', ["message" => $e->getMessage()]);
}