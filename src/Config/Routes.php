<?php

use \Crodev\Core\Router;

// Home Page
Router::addRoute('/', 'GET', [
    'handler' => 'test',
    'action' => 'index'
]);

// Test Page
Router::addRoute('/test/',  'GET', [
    'handler' => 'home',
    'action' => 'index'
]);

// 404 Page
Router::addRoute('/404/',  'GET', [
    'handler' => 'error',
    'action' => 'notFound'
]);