<?php
// Set the initial include_path. You may need to change this to ensure that
// Zend Framework is in the include_path; additionally, for performance
// reasons, it's best to move this to your web server configuration or php.ini
// for production.
set_include_path(implode(PATH_SEPARATOR, array(
    realpath(dirname(__FILE__) . '/library'),
    get_include_path(),
)));

// Define o caminho do diretуrio da aplicaзгo
defined('APPLICATION_PATH')
    || define('APPLICATION_PATH', realpath(dirname(__FILE__) . '/application'));

// Define o ambibiente da aplicaзгo
defined('APPLICATION_ENV')
    || define('APPLICATION_ENV', (getenv('APPLICATION_ENV') ? getenv('APPLICATION_ENV') : 'development'));

/** Zend_Application */
require_once 'library/Zend/Application.php';

// Create application, bootstrap, and run
$application = new Zend_Application(
    APPLICATION_ENV,
    './etc/application.ini'
);

$application->bootstrap();
$application->run();
?>