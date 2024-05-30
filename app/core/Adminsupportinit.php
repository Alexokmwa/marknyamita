<?php

// deny acess to app files and folders access.
defined('ROOTPATH') or exit('Access Denied!');

spl_autoload_register(function ($classname) {
    $filename = '../' . str_replace('\\', '/', $classname) . '.php';
    if (file_exists($filename)) {
        require $filename;
    } else {
        // Error handling for missing files
        error_log("Failed to load class: $classname. File not found: $filename");
    }
});
require 'config.php';
require 'functions.php';
require 'Database.php';
require 'Model.php';
require 'Adminsupportcontroller.php';
require 'Adminsupportapp.php';
