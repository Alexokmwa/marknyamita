<?php

namespace app\core;

// deny acess to app files and folders access.
defined('ROOTPATH') or exit('Access Denied!');
/**
 * adminapp class
 */

class Adminapp
{
    private $controller = 'Adminhome';
    private $method = 'adminindex';
    private function splitUrl()
    {
        // $URL = $_GET['url'] ?? 'Landingpage';
        $URL = $_GET['url'] ?? 'Adminhome';
        $URL = explode("/", trim($URL, "/"));
        return $URL;
    }
    public function loadController()
    {
        $URL = $this ->splitUrl();
        //select controller
        $controllerName =  ucfirst($URL[0]);

        // Array of directories to check for controller files
        $directories = [
            "../app/controllers/",

            /**
             * admin controllers
             */
            "../app/controllers/adminviews/adminaccountsctrl/",
            "../app/controllers/adminviews/admingeneralpagesctrl/",
            "../app/controllers/adminviews/admingeneralpagesctrl/pages/",
            "../app/controllers/adminviews/admingeneralpagesctrl/posts/",
            "../app/controllers/adminviews/admingeneralpagesctrl/posts/postssearchpages/",

        ];

        $found = false;

        // Iterate over each directory and check if the file exists
        foreach ($directories as $directory) {
            $filename = $directory . $controllerName . ".php";
            if (file_exists($filename)) {
                require($filename);
                $this->controller = $controllerName;
                unset($URL[0]);
                $found = true;
                break;
            }
        }

        // If not found in any directory, load the NotFound404 controller
        if (!$found) {
            require("../app/controllers/adminviews/Adminnotfound.php");
            $this->controller = "Adminnotfound";
        }
        // $filename = "../app/controllers/". $controllerName.".php";
        // if (file_exists($filename)) {
        //     require($filename);
        //     $this -> controller = ucfirst($URL[0]);
        // } else {
        //     $filename = "../app/controllers/NotFound404.php";
        //     require($filename);
        //     $this ->controller = "NotFound404";

        // }

        $controllerClass = "app\\controllers\\" . $this->controller;
        $controller = new $controllerClass();
        //select method
        if(!empty($URL[1])) {
            if (method_exists($controller, $URL[1])) {
                $this->method = $URL[1];
                unset($URL[1]);

            }
        }
        call_user_func_array([$controller, $this -> method], $URL);

    }
}
