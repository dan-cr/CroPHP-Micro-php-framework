<?php

use Crodev\Core\Router;
use Crodev\Core\Request;
use Crodev\Core\Dispatcher;

// PSR-4 Autoloading
require_once __DIR__ . '/../../vendor/autoload.php';

// Application Constants
require_once __DIR__ . '/../Config/Constants.php';

// Application Routes
require_once BASE_URL . '/Config/Routes.php';

// Retrieves all user specified routes in Routes.php
$routes = Router::getRoutes();

// Retrieve current path in segments using '/' as delimiter
$path = array_filter(
    preg_split(
        "#/#",
        Request::getPath()
    )
);

// Check if current path matches a specified route in config
$matchedRoute = Router::matchRoute($routes, $path);

try {
    // Dispatch request if found, otherwise display 404
    if ($matchedRoute) {
        Dispatcher::execute($matchedRoute['controller'], $matchedRoute['action']);
    } else {
        Dispatcher::execute('error', 'notFound');
    }
} catch (\Exception $e) {
    Dispatcher::execute('error', 'generic', $e->getMessage());
}