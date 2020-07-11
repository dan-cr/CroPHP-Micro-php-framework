<?php

use \Crodev\Core\Router;

// Home Page
Router::addRoute('/', 'GET', [
    'controller' => 'test',
    'action' => 'index'
]);

// Test Page
Router::addRoute('/test/',  'GET', [
    'controller' => 'home',
    'action' => 'index'
]);

// 404 Page
Router::addRoute('/404/',  'GET', [
    'controller' => 'error',
    'action' => 'notFound'
]);