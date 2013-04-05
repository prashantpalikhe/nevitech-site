<?php

define('NEVITECH_ROOT', realpath(dirname(__FILE__)));

// Define path to application directory
defined('APPLICATION_PATH')
    || define('APPLICATION_PATH', realpath(dirname(__FILE__) . '/application'));

define('NEVITECH_APPLICATION_PATH', APPLICATION_PATH);


// Define application environment
defined('APPLICATION_ENV')
    || define('APPLICATION_ENV', (getenv('APPLICATION_ENV') ? getenv('APPLICATION_ENV') : 'development'));

define('NEVITECH_APPLICATION_ENV', APPLICATION_ENV);

// Ensure library/ is on include_path
set_include_path(
    NEVITECH_ROOT . '/library'
    . PATH_SEPARATOR . get_include_path()
);

/** Zend_Application */
require_once 'Zend/Application.php';

// Create application, bootstrap, and run
$application = new Zend_Application(
    NEVITECH_APPLICATION_ENV,
    NEVITECH_APPLICATION_PATH . '/configs/application.ini'
);

$application->bootstrap()->run();