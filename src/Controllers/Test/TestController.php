<?php

namespace Crodev\Controllers\Test;

use Crodev\Controllers\AbstractController;

class TestController extends AbstractController {

    public function index(array $data) {
        $this->render('test', array_merge(['test' => 'hi'], $data));
    }

}