<?php

namespace Crodev\Core\Utilities;

class Templating {

    /**
     * Return clean url for use in templates which includes the relative path
     * @param string $url
     * @return string
     */
    public static function url(string $url) {
        if ($url === '/') {
            echo PROJECT_DIR;
        } else {
            if (strpos($url, '/') === 0) {
                $url = substr($url, 1);
            }
            echo PROJECT_DIR . $url;
        }
    }
}