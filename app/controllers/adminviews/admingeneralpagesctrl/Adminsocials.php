<?php

namespace app\controllers;

// deny acess to app files and folders access.
defined('ROOTPATH') or exit('Access Denied!');

use app\core\Admincontroller;

/**
 * admin  social management class
 */
class Adminsocials extends Admincontroller
{
    public function adminindex()
    {

        $this ->adminview('adminviews/admingeneralpages/adminsocials');
    }
}
