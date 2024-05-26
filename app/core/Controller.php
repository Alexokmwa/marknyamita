<?php

namespace app\core;

// deny acess to app files and folders access.
defined('ROOTPATH') or exit('Access Denied!');

/**
 * controller class
 */
class Controller
{
    public function view($name, $data = [])
    {
        if(!empty($data)) {
            extract($data);
        }
        $filename = "../app/views/".$name.".view.php";
        if (file_exists($filename)) {
            require($filename);
        } else {
            $filename = "../app/views/404.view.php";
            require($filename);

        }
    }
}