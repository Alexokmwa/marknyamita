<?php

namespace app\controllers;

// deny acess to app files and folders access.
defined('ROOTPATH') or exit('Access Denied!');

use app\core\Admincontroller;

/**
 * admin media management class
 */
class Adminmedia extends Admincontroller
{
    public function adminindex()
    {

        $this ->adminview('adminviews/admingeneralpages/adminmedia');
    }
}
