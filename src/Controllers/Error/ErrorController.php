<?php

namespace Crodev\Controllers\Error;

use Crodev\Controllers\AbstractController;

class ErrorController extends AbstractController {

    private $container;

    private $renderer;

    public function __construct($container) {
        $this->container = $container;
        $this->renderer  = $container['renderer'];
    }

    /**
     * Renders a 404 page not found error
     */
    public function notFound() {
        $this->renderPage('404', [
            'error' => 'Page not found'
        ], $this->renderer);
    }

    /**
     * Renders some generic error passing some error messages
     */
    public function generic(array $errors) {
        $this->renderPage('error', [
            'errors' => $errors
        ], $this->renderer);
    }

}
