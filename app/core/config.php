<?php

// deny acess to app files and folders access.
defined('ROOTPATH') or exit('Access Denied!');
if($_SERVER['SERVER_NAME'] === 'localhost') {
    //database config
    define('DBNAME', 'nyamitamark');
    define('DBHOST', 'localhost');
    define('DBUSER', 'root');
    define('DBPASS', '');
    define('DBDRIVER', '');
    //asserts loading cnfig
    define('ROOT', 'http://localhost/marknyamita/Public/');
} else {
    define('DBNAME', 'nyamitamark');
    define('DBHOST', 'localhost');
    define('DBUSER', 'root');
    define('DBPASS', '');
    define('DBDRIVER', '');
    define('ROOT', 'https://yourwesite.com');
}

define('APP_NAME', 'Mark nyamita');
define('APP_DESCRIPTION', 'Mark nyamita campaign platform');
//true shows errors
define('DEBUG', true);
