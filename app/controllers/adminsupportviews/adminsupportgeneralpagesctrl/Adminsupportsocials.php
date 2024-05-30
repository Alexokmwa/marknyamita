<?php

namespace app\controllers;

// deny acess to app files and folders access.
defined('ROOTPATH') or exit('Access Denied!');

use app\core\Adminsupportcontroller;
/**
 * admin support social management class
 */
class Adminsupportsocials extends Adminsupportcontroller
{
    public function adminsupportindex()
    {
        $this->adminsupportView('adminsupportviews/adminsupportgeneralpages/adminsupportsocials');

        // echo  "404 error page not found";
    }
}
