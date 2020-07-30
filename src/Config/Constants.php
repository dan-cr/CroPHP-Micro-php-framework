<?php


// Base Url
define('BASE_URL', __DIR__ . '/..');


// Environment (DEVELOPMENT / PRODUCTION) - Set to DEVELOPMENT to display errors
define('ENVIRONMENT', 'DEVELOPMENT');


// Development Scripts Directory
define('DEV_SCRIPTS_DIR', BASE_URL . '/../public/Assets/Scripts/');


// Development Stylesheet Directory
define('DEV_STYLES_DIR', BASE_URL . '/../public/Assets/Stylesheets/');


// Development Images Directory
define('DEV_IMAGES_DIR', BASE_URL . '/../public/Assets/Images/');


// Templates Directory
define('TEMPLATES_DIR', BASE_URL . '/Templates/');


if (ENVIRONMENT === 'DEVELOPMENT') {
    ini_set('display_errors', '1');
    ini_set('display_startup_errors', '1');
    error_reporting(E_ALL);
}


/*********************************************************
        Constants should be added/modified below 
        that relate to setup of this project
***********************************************************/


// Project Namespace
define('PROJECT_NAMESPACE', 'Crodev');


// Document Root (Change this to match your root folder)
define('PROJECT_DIR', '/projects/crodev/');


// Public Scripts Directory
define('PUBLIC_SCRIPTS_DIR', PROJECT_DIR . 'public/Assets/Scripts/');


// Public Stylesheet Directory
define('PUBLIC_STYLES_DIR', PROJECT_DIR . 'public/Assets/Stylesheets/');


// Public Images Directory
define('PUBLIC_IMAGES_DIR', PROJECT_DIR . 'public/Assets/Images/');


// Controller Path
Define('CONTROLLER_PATH', '\\' . PROJECT_NAMESPACE . '\Controllers\\');