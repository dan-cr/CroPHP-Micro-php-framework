<?php

namespace Crodev\Core\Template;

class TemplateRenderer {

    public function loadHeader() {
        $path = TEMPLATES_DIR . '/Includes/' . 'Header.php';
        if (file_exists($path)) {
            require_once $path;
        }
    }

    public function loadTemplate($file, $data) {
        $templatePath = TEMPLATES_DIR . ucfirst($file) . '.php';
        if (file_exists($templatePath)) {
            if (!empty($data)) {
                extract($data);
            }
            require_once $templatePath;
        }
    }

    public function loadFooter() {
        $path = TEMPLATES_DIR . '/Includes/' . 'Footer.php';
        if (file_exists($path)) {
            require_once $path;
        }
    }

    public function render($file, $data) {
        $this->loadHeader();
        $this->loadTemplate($file, $data);
        $this->loadFooter();
    }
}
