<?php
use Crodev\Core\Template\TemplateRenderer;

$container['renderer'] = function ($c) {
    return new TemplateRenderer();
};
