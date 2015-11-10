<?php

/*****
 * 
 * Définir Environnement
 */
define('ENVIRONMENT', 'development');
if (ENVIRONMENT == 'development' || ENVIRONMENT == 'dev') {
    error_reporting(E_ALL);
    ini_set("display_errors", 1);
}

/*****
 * URL helper
 */
define('ROOT', str_replace('index.php', '', $_SERVER['SCRIPT_NAME'])); //base dossier
define('WEBROOT', str_replace('index.php', '', $_SERVER['SCRIPT_FILENAME'])); //Base absolue
define('APPROOT', ROOT . 'application/'); //application dossier
define('WEBAPPROOT', WEBROOT . 'application/'); //application dossier

/***
 * DATEBASE
 */
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', 'root');
define('DB_DB', 'rpm_bd');