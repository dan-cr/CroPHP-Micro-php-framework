<?php

namespace Crodev\Core;

use Exception;

class Dispatcher {
    
    /**
     * Dispatch the request to the controller
     *
     * @param string $controller
     * @param string $func
     * @param array $data
     * @return void
     */
    public static function execute(string $controller, string $method, array $data = null): void {

        $class = ucfirst($controller);

        // Get namespaced controller name
        $className = '\\' . PROJECT_NAMESPACE . '\Controllers\\' . $class . '\\' . $class . 'Controller';

        // Load the controller if it exists
        if (class_exists($className)) {
            $object = new $className;
            if (method_exists($object, $method)) {
                call_user_func( array( new $className, $method ), $data );
            } else {
                throw new Exception('Method: <strong>' . $method . '</strong> specified in config does not exist on controller.');
            }
        } else {
            throw new Exception('Class: <strong>' . $className . '</strong> does not does not exist.');
        }

    }

}