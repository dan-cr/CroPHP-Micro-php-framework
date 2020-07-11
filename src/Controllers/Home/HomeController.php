<?php

namespace Crodev\Controllers\Home;

use Crodev\Controllers\AbstractController;

 class HomeController extends AbstractController {

    public function index() {
        $this->render('home');
    }

}