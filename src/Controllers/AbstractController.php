<?php

namespace Crodev\Controllers;

use Crodev\Core\Services\Container;

abstract class AbstractController {

    /**
     * Renders a template of the same name with the static header and footer
     * 
     * @param string $template
     * @param mixed array|null
     * @return void
     */
    public function renderPage(string $template, $data = null): void {


         // BAD !! REDO TIS, LOOK AT AUTOWIRING AND THIRD PARTY DI CONTAINERS
        $renderer = (new Container)->getRenderer();

        // Render Header
        $renderer->loadHeader();

        // Render Template
        $renderer->loadTemplate($template, $data);

        // Render Footer
        $renderer->loadFooter();

    }

}