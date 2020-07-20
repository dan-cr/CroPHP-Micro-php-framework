<?php


// Base Url
define('BASE_URL', __DIR__ . '/..');


// Environment (DEVELOPMENT / PRODUCTION) - Set to DEVELOPMENT to display errors
define('ENVIRONMENT', 'DEVELOPMENT');


// Scripts Directory
define('SCRIPTS_DIR', BASE_URL . '/Assets/Scripts/');


// Styles Directory
define('STYLES_DIR', BASE_URL . '/Assets/Stylesheets/');


// Images Directory
define('IMAGES_DIR', BASE_URL . '/Assets/Images/');


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


// Document Root (Change this to match your root folder)
define('PROJECT_DIR', '/projects/crodev/');


// Project Namespace
define('PROJECT_NAMESPACE', 'Crodev');