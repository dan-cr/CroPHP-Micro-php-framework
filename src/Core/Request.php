<?php

namespace Crodev\Core;

class Request {

    private static $scheme;

    private static $host;

    private static $path;

    
    /**
     * Returns the current url
     *
     * @return string
     */
    public static function getRequestedUrl(): string {
        return (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    }

    /**
     * Split entire url into seperate parts
     *
     * @return void
     */
    public static function getUrlParts(): void {
        $url = self::getRequestedUrl();
        $url_parts = parse_url($url);

        // Remove root directory from path if provided in config
        $url_parts['path'] = str_replace(PROJECT_DIR, '', $url_parts['path']);

        self::$scheme   = $url_parts['scheme'];
        self::$host     = $url_parts['host'];
        self::$path     = $url_parts['path'];
    }

    /**
     * Returns parts of the path split using the '/' delimiter
     *
     * @return string
     */
    public static function getPath(): string {
        self::getUrlParts();
        // Add starting slash if missing
        if (strpos(self::$path, '/') !== 0) {
            self::$path = '/' . self::$path;
        }
        // Add trailing slash if missing
        if (substr(self::$path, -1) !== '/') {
            self::$path = self::$path . '/'; 
        }
        // Remove duplicate forward slashes and return path
        return preg_replace('/\/+/', '/', self::$path);
    }

    /**
     * Determine the request method
     * 
     * @return string
     */
    public static function getRequestMethod(): string {
        return $_SERVER['REQUEST_METHOD'];
    }
}