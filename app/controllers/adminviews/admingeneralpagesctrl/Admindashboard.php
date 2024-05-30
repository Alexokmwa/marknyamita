<?php

namespace app\controllers;

// deny acess to app files and folders access.
defined('ROOTPATH') or exit('Access Denied!');

use app\core\Admincontroller;

/**
 * admin dashboard management class
 */
class Admindashboard extends Admincontroller
{
    public function adminindex()
    {

        $this ->adminview('adminviews/admingeneralpages/admindashboard');
    }
}
