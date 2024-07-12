<?php

namespace app\controllers;

// deny acess to app files and folders access.
defined('ROOTPATH') or exit('Access Denied!');

use app\core\Admincontroller;
use app\models\Adminaccounts;
use app\models\Request;

/**
 * admin not found management class
 */
class Adminsignin extends Admincontroller
{
    public function adminindex()
    {
        $data['admintitle'] = "Admin Login";

        $data['admin'] = new Adminaccounts();

        $req = new Request();
        if($req->posted()) {
            $data['admin']->adminlogin($_POST);
        }
        $this ->adminview('adminviews/adminaccounts/adminsignin', $data);
    }
}
