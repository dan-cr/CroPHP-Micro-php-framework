<?php

namespace Crodev\Core;

class Dispatcher {

    private $container;

    public function __construct($container) {
        $this->container = $container;
    }

    /**
     * Dispatch the request to the controller
     *
     * @param string $controller
     * @param string $func
     * @param array $data
     * @return void
     */
    public function execute(string $controller, string $method, array $data = null): void {

        $class = ucfirst($controller);

        // Get namespaced controller name
        $className = CONTROLLER_PATH . $class . '\\' . $class . 'Controller';

        // Load the controller if it exists
        if (class_exists($className)) {
            // Create controller object passing the container
            $object = new $className($this->container);
            if (method_exists($object, $method)) {
                call_user_func([$object, $method], $data);
            } else {
                throw new \Exception(sprintf('Method: %s specified in config does not exist on controller', $method));
            }
        } else {
            throw new \Exception(sprintf('Class: %s does not does not exist.', $className));
        }

    }

}
