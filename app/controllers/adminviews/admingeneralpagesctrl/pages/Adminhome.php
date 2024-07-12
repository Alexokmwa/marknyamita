<?php

namespace app\controllers;

// deny acess to app files and folders access.
defined('ROOTPATH') or exit('Access Denied!');

use app\core\Admincontroller;

/**
 * admin home management class
 */
class Adminhome extends Admincontroller
{
    public function adminindex()
    {
        $data['admintitle'] = "Admin Home";


        $this ->adminview('adminviews/admingeneralpages/adminpages/adminhome',$data);
    }
}
