<?php

namespace app\core;

// deny acess to app files and folders access.
defined('ROOTPATH') or exit('Access Denied!');

/**
 * controller class
 */
class Admincontroller
{
    public function adminView($name, $data = [])
    {
        if(!empty($data)) {
            extract($data);
        }
        include "../app/views/adminviews/adminsharablepages/adminhtmlheaderfooter/adminheader.view.php";
        $filename = "../app/views/".$name.".view.php";
        if (file_exists($filename)) {
            require($filename);
        } else {
            
            $filename = "../app/views/adminviews/admin404.view.php";
            require($filename);

        }
    }
}
