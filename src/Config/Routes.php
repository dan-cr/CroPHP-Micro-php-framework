<?php

// Disable type coercion and enforces scalar type hints
declare (strict_types = 1);

$router->addRoute('/', 'GET', ['handler' => 'test', 'action' => 'index']); // Home
$router->addRoute('/test/', 'GET', ['handler' => 'test', 'action' => 'test']); // Test
$router->addRoute('/404/', 'GET', ['handler' => 'error', 'action' => 'notFound']); // Error
