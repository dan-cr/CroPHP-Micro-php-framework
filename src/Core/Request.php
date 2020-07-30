<?php

namespace Crodev\Core;

class Request {

    private $scheme;

    private $host;

    private $path;

    
    /**
     * Returns the current url
     *
     * @return string
     */
    public function getRequestedUrl(): string {
        return (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    }

    /**
     * Split entire url into seperate parts
     *
     * @return void
     */
    public function getUrlParts(): void {
        $url = $this->getRequestedUrl();
        $url_parts = parse_url($url);

        // Remove root directory from path if provided in config
        $url_parts['path'] = str_replace(PROJECT_DIR, '', $url_parts['path']);

        $this->scheme   = $url_parts['scheme'];
        $this->host     = $url_parts['host'];
        $this->path     = $url_parts['path'];
    }

    /**
     * Returns parts of the path split using the '/' delimiter
     *
     * @return string
     */
    public function getPath(): string {
        $this->getUrlParts();
        // Add starting slash if missing
        if (strpos($this->path, '/') !== 0) {
            $this->path = '/' . $this->path;
        }
        // Add trailing slash if missing
        if (substr($this->path, -1) !== '/') {
            $this->path = $this->path . '/'; 
        }
        // Remove duplicate forward slashes and return path
        return preg_replace('/\/+/', '/', $this->path);
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