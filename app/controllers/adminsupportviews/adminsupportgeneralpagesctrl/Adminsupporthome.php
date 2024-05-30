<?php

namespace app\controllers;

// deny acess to app files and folders access.
defined('ROOTPATH') or exit('Access Denied!');

use app\core\Adminsupportcontroller;

/**
 * admin support home management class
 */
class Adminsupporthome extends Adminsupportcontroller
{
    public function adminsupportindex()
    {

        $this ->adminsupportview('adminsupportviews/adminsupportgeneralpages/adminsupporthome');
    }
}
