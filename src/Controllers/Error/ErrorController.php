<?php

namespace Crodev\Controllers\Error;

use Crodev\Controllers\AbstractController;

class ErrorController extends AbstractController {

    /**
     * Renders a 404 page not found error
     */
    public function notFound() {
        $this->render('404');
    }

    /**
     * Renders some generic error passing some error messages
     */
    public function generic($error) {
        $this->render('error', [
            'error' => $error
        ]);
    }

}