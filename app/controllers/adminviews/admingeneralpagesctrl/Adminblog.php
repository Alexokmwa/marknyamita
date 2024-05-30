<?php

namespace app\controllers;

// deny acess to app files and folders access.
defined('ROOTPATH') or exit('Access Denied!');

use app\core\Admincontroller;

/**
 * admin blog management class
 */
class Adminblog extends Admincontroller
{
    public function adminindex()
    {

        $this ->adminview('adminviews/admingeneralpages/adminblog');
    }
}
