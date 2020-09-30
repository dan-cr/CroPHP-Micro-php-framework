<?php

namespace Crodev\Controllers\Test;

use Crodev\Controllers\AbstractController;

class TestController extends AbstractController {

    private $container;

    private $renderer;

    public function __construct($container) {
        $this->container = $container;
        $this->renderer  = $container['renderer'];
    }

    public function index(array $data): void {
        $this->renderPage('test', array_merge(['test' => 'hi'], $data), $this->renderer);
    }

    public function test(array $data): void {
        $this->renderPage('test1', array_merge(['test' => 'hi'], $data), $this->renderer);
    }

}
