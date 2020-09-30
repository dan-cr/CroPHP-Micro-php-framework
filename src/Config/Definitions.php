<?php
use Crodev\Core\Template\DefaultRenderer;

$container['renderer'] = function ($c) {
    return new DefaultRenderer();
};
