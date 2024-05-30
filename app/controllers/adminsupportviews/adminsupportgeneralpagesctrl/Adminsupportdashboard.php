<?php

namespace app\controllers;

// deny acess to app files and folders access.
defined('ROOTPATH') or exit('Access Denied!');

use app\core\Adminsupportcontroller;

class Adminsupportdashboard extends Adminsupportcontroller
{
    public function adminsupportindex()
    {
        $this->adminsupportView('adminsupportviews/adminsupportgeneralpages/adminsupportdashboard');

        // echo  "404 error page not found";
    }
}
