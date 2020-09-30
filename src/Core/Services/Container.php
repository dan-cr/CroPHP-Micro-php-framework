<?php

namespace Crodev\Core\Services;

use Crodev\Core\Template\templateRenderer;

class Container {

    private $renderer;

    public function getRenderer() {
        if (isset($this->renderer)) {
            return $this->renderer;
        }
        $this->renderer = new templateRenderer();
        return $this->renderer;
    }

}
