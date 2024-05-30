<?php

namespace app\controllers;

// deny acess to app files and folders access.
defined('ROOTPATH') or exit('Access Denied!');

use app\core\Adminsupportcontroller;
/**
 * admin support nitfound management class
 */
class Adminsupportnotfound extends Adminsupportcontroller
{
    public function adminsupportindex()
    {
        $this->adminsupportView('adminsupportviews/adminsupport404');

        // echo  "404 error page not found";
    }
}
