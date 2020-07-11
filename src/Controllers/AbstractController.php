<?php

namespace Crodev\Controllers;

use Crodev\Core\Utilities\Templating as T;

abstract class AbstractController {

    /**
     * Renders a template of the same name with the static header and footer
     * 
     * @param string $template
     * @param mixed array|null
     * @return void
     */
    public function render($template, $data = null): void {

        $dir = TEMPLATES_DIR;

        // Pass templating functions as variable $T to view
        $data['T'] = new T();

        extract($data);

        // Render Header
        require_once($dir . '/Includes/' . 'Header.php');

        $templatePath = $dir . ucfirst($template) . '.php';

        if (file_exists($templatePath)) {
            require_once($templatePath);
        }

        // Render Footer
        require_once($dir . '/Includes/' . 'Footer.php');
    }

}