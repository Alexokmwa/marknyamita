<?php

namespace app\controllers;

// deny acess to app files and folders access.
defined('ROOTPATH') or exit('Access Denied!');

use app\core\Adminsupportcontroller;
/**
 * admin support blog management class
 */
class Adminsupportblog extends Adminsupportcontroller
{
    public function adminsupportindex()
    {
        $this->adminsupportView('adminsupportviews/adminsupportgeneralpages/adminsupportblog');

        // echo  "404 error page not found";
    }
}
