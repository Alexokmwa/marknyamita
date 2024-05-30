<?php

session_start();

/**  Valid PHP Version? **/
$minPHPVersion = '8.0';
if (phpversion() < $minPHPVersion) {
    die("Your PHP version must be {$minPHPVersion} or higher to run this app. Your current version is " . phpversion());
}

/**  Path to this file **/
define('ROOTPATH', __DIR__ . DIRECTORY_SEPARATOR);
use app\core\Adminsupportapp;

require "../app/core/Adminsupportinit.php";
DEBUG ? ini_set('display_errors', 1) : ini_set('display_errors', 0);
$appsupport = new Adminsupportapp();
$appsupport ->loadController();
