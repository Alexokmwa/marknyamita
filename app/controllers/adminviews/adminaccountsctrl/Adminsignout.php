<?php

namespace app\controllers;

// deny acess to app files and folders access.
defined('ROOTPATH') or exit('Access Denied!');

use app\core\Admincontroller;
use app\models\Adminsession;

/**
 * admin not found management class
 */
class Adminsignout extends Admincontroller
{
    public function adminindex()
    {
        $ses = new Adminsession();
        $ses->logout();
        redirectadmin('Adminsignin');
    }
}
