<?php

namespace app\controllers;

// deny acess to app files and folders access.
defined('ROOTPATH') or exit('Access Denied!');

use app\core\Admincontroller;
use app\models\Adminsession;

/**
 * admin dashboard management class
 */
class Admindashboard extends Admincontroller
{
    public function adminindex()
    {
       
        $ses = new Adminsession();
        if(!$ses->isLoggedIn()) {
            redirectadmin('Adminsignin');
        }
        $data['admintitle'] = "Admin Dashboard";


        $this ->adminview('adminviews/admingeneralpages/admindashboard', $data);
    }
}
