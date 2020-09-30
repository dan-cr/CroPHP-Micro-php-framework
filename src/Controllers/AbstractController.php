<?php

namespace Crodev\Controllers;

abstract class AbstractController {

    /**
     * Renders a template of the same name with the static header and footer
     *
     * @param string $template
     * @param mixed array|null
     * @return void
     */
    public function renderPage(string $template, $data = null, $renderer): void {
        $renderer->render($template, $data);
    }

}
