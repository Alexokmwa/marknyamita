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
    /**
     * user root
     */
    define('ROOT', 'http://localhost/marknyamita/Public/');
    /**
     * adminroot
     */
    define('ROOTADMIN', 'http://localhost/marknyamita/admin/');
    /**
     * adminsupport root
     */
    define('ROOTADMINSUPPORT', 'http://localhost/marknyamita/adminsupport/');
} else {
    define('DBNAME', 'nyamitamark');
    define('DBHOST', 'localhost');
    define('DBUSER', 'root');
    define('DBPASS', '');
    define('DBDRIVER', '');
    // user root
    define('ROOT', 'https://b304-102-216-154-44.ngrok-free.app/marknyamita/Public/');
    // admin root
    define('ROOTADMIN', 'https://b304-102-216-154-44.ngrok-free.app/marknyamita/admin/');
    // admin support
    define('ROOTADMINSUPPORT', 'https://b304-102-216-154-44.ngrok-free.app/marknyamita/adminsupport/');
}

define('APP_NAMEADMIN', 'ADMIN');
define('APP_NAMEADMINSUPPORT', 'SUPPORT');
define('APP_NAME', 'Mark nyamita');
define('APP_DESCRIPTIONADMIN', 'ADMIN');
define('APP_DESCRIPTION', 'Mark nyamita campaign platform');
//true shows errors
define('DEBUG', true);
