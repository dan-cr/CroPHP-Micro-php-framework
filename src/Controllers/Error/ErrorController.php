<?php

namespace Crodev\Controllers\Error;

use Crodev\Controllers\AbstractController;
use Crodev\Core\Template\AbstractRenderer;

class ErrorController extends AbstractController {

    /**
     * Renders a 404 page not found error
     */
    public function notFound() {
        $this->renderPage('404');
    }

    /**
     * Renders some generic error passing some error messages
     */
    public function generic($error) {
        $this->renderPage('error', [
            'error' => $error
        ]);
    }

}