<?php

namespace app\controllers;

// deny acess to app files and folders access.
defined('ROOTPATH') or exit('Access Denied!');

use app\core\Admincontroller;
/**
 * admin not found management class
 */
class Adminnotfound extends Admincontroller
{
    public function adminindex()
    {
        $this->adminView('adminviews/admin404.view.php');

        // echo  "404 error page not found";
    }
}
