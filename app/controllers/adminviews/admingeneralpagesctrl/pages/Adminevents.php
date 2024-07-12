<?php

namespace app\controllers;

// deny acess to app files and folders access.
defined('ROOTPATH') or exit('Access Denied!');

use app\core\Admincontroller;

/**
 * admin events management class
 */
class Adminevents extends Admincontroller
{
    public function adminindex()
    {
        $data['admintitle'] = "Admin Events";


        $this ->adminview('adminviews/admingeneralpages/adminpages/adminevents',$data);
    }
}
