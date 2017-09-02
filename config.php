<?php
require_once 'jaksdb.php';

define('IS_PRODUCTION', false);

define('DB_CHARSET', 'utf8');
define('DB_COLLATE', '');

define('ABSPATH', dirname(__FILE__));

define('HTTPS', isset($_SERVER['HTTPS']) && !empty($_SERVER['HTTPS']) ? 'https' : 'http');

if(IS_PRODUCTION) {
//      YOU WILL WANT TO DEFINE THIS WHEN RUNNING IN PRODUCTION.
    define('WP_DEBUG', false);
    define('WP_DEBUG_DISPLAY', false);
    define('BASEURL', HTTPS.'://www.?????.com');
    define( 'DB_NAME',     '????' ); // set database name
    define( 'DB_USER',     '????' ); // set database user
    define( 'DB_PASSWORD', '?????????' ); // set database password
    define( 'DB_HOST',     'mysql.jakson.com' ); // set database host
}
else {
    define('WP_DEBUG', true);
    define('WP_DEBUG_DISPLAY', true);
    define('BASEURL', HTTPS.'://law.jak.com');
    define('DB_NAME', 'company');
    define('DB_USER', 'root');
    define('DB_PASSWORD', 'root');
    define('DB_HOST', 'localhost');
}
$db = new JaksDb(DB_USER, DB_PASSWORD, DB_NAME, DB_HOST);

session_start();
