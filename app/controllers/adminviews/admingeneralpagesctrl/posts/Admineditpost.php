<?php

namespace app\controllers;

// deny acess to app files and folders access.
defined('ROOTPATH') or exit('Access Denied!');

use app\core\Admincontroller;
use app\models\Adminsession;

/**
 * admin Admineditpost management class
 */
class Admineditpost extends Admincontroller
{
    public function adminindex()
    {
        $ses = new Adminsession();
        if(!$ses->isLoggedIn()) {
            redirectadmin('Adminsignin');
        }
        $data['admintitle'] = "Admin Editpost";

        $this ->adminview('adminviews/admingeneralpages/adminpost/admineditpost', $data);
    }
}
