<?php

use Crodev\Core\Router;
use Crodev\Core\Request;
use Crodev\Core\Dispatcher;
use Crodev\Core\Utilities\Url\UrlHelper;

// PSR-4 Autoloading
require_once __DIR__ . '/../../vendor/autoload.php';

// Application Constants
require_once __DIR__ . '/../Config/Constants.php';

// Application Routes
require_once BASE_URL . '/Config/Routes.php';

// Retrieves all user specified routes in Routes.php
$routes = Router::getRoutes();

// Retrieve current path in segments using as array
$path = UrlHelper::getNonEmptyPathSegmentsAsArray(Request::getPath());

// Check if current path matches a specified route in config
$matchedRoute = Router::matchRoute($routes, $path);

try {
    // Dispatch request if found, otherwise display 404
    if ($matchedRoute) {
        $data = [];
        $indexes = Router::getRouteVariableIndexes($matchedRoute);
        if ($indexes) {
            foreach($indexes as $var => $value) {
                $variable = substr($key, 1);
                $data[$variable] = $path[$value + 1];
            }
        }
        Dispatcher::execute($matchedRoute['handler'], $matchedRoute['action'], $data);
    } else {
        Dispatcher::execute('error', 'notFound');
    }
} catch (\Exception $e) {
    Dispatcher::execute('error', 'generic', ["error" => $e->getMessage()]);
}