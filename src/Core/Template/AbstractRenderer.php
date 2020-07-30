<?php

namespace Crodev\Core\Template;

abstract class AbstractRenderer {

    abstract public function loadHeader();

    abstract public function loadTemplate(string $file, ?array $data);

    abstract public function loadFooter();
    
}