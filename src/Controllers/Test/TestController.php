<?php

namespace Crodev\Controllers\Test;

use Crodev\Controllers\AbstractController;

class TestController extends AbstractController {

    public function index() {
        $this->render('test', ['test' => 'hi']);
    }

}