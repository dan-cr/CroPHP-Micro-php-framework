<?php

// Disable type coercion and enforces scalar type hints
declare(strict_types=1);

use \Crodev\Core\Router;

Router::addRoute('/', 'GET', ['handler' => 'test', 'action' => 'index']);               // Home
Router::addRoute('/test/test/',  'GET', ['handler' => 'home', 'action' => 'index']);    // Test
Router::addRoute('/404/',  'GET', ['handler' => 'error', 'action' => 'notFound']);      // Error