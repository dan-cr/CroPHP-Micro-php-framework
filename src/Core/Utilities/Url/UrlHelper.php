<?php

namespace Crodev\Core\Utilities\Url;

class UrlHelper
{

    /**
     * Returns all path segments after the base url as an array
     * @param string $path
     * @return array
     */
    public static function getNonEmptyPathSegmentsAsArray(string $path): array {
        return array_filter(
            preg_split(
                "#/#",
                $path
            )
        );
    }
}
