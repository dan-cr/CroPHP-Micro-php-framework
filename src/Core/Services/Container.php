<?php

namespace Crodev\Core\Services;

use Crodev\Core\Template\DefaultRenderer;

class Container {

    private $renderer;

    public function getRenderer() {
        if (isset($this->renderer)) {
            return $this->renderer;
        }
        $this->renderer = new DefaultRenderer();
        return $this->renderer;
    }

}