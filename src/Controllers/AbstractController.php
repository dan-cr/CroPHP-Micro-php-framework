<?php

namespace Crodev\Controllers;

use Crodev\Core\Template\AbstractRenderer;

abstract class AbstractController {

    /**
     * Renders a template of the same name with the static header and footer
     *
     * @param string $template
     * @param mixed array|null
     * @return void
     */
    public function renderPage(string $template, $data = null, AbstractRenderer $renderer): void {

        // Render Header
        $renderer->loadHeader();

        // Render Template
        $renderer->loadTemplate($template, $data);

        // Render Footer
        $renderer->loadFooter();

    }

}
