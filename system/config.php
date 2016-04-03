<?php
/* * ***
 * 
 * Définir Environnement
 */
define('ENVIRONMENT', $_SERVER['SERVER_NAME'] === "localhost" ? 'dev' : 'prod');
if (ENVIRONMENT == 'dev') {
    error_reporting(E_ALL);
    ini_set("display_errors", 1);
}

/* * ***
 * URL helper
 */
define('ROOT', str_replace('index.php', '', $_SERVER['SCRIPT_NAME'])); //base dossier
define('WEBROOT', str_replace('index.php', '', $_SERVER['SCRIPT_FILENAME'])); //Base absolue
define('APPROOT', ROOT . 'application/'); //application dossier
define('WEBAPPROOT', WEBROOT . 'application/'); //application dossier
define('ADMINROOT', ROOT . 'admin/'); //application dossier

/* * *
 * DATEBASE
 */
if (ENVIRONMENT == 'dev') {
    define('DB_HOST', 'localhost');
    define('DB_USER', 'root');
    define('DB_PASSWORD', '');
    define('DB_DB', 'bysol958_rpm');
} else {
    define('DB_HOST', 'localhost');
    define('DB_USER', 'bysol958_root');
    define('DB_PASSWORD', 'root123');
    define('DB_DB', 'bysol958_rpm');
}
