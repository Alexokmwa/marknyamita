<?php

namespace app\controllers;

// deny acess to app files and folders access.
defined('ROOTPATH') or exit('Access Denied!');

use app\core\Adminsupportcontroller;
/**
 * admin support smedia management class
 */
class Adminsupportmedia extends Adminsupportcontroller
{
    public function adminsupportindex()
    {
        $this->adminsupportView('adminsupportviews/adminsupportgeneralpages/adminsupportmedia');

        // echo  "404 error page not found";
    }
}
