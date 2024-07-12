<?php

namespace app\controllers;

// deny acess to app files and folders access.
defined('ROOTPATH') or exit('Access Denied!');

use app\core\Admincontroller;
use app\models\Adminaccounts;
use app\models\Request;

/**
 * Adminsignup class
 */
class Adminsignup extends Admincontroller
{
    public function adminindex()
    {
        
        $data['admintitle'] = "Admin Signup";
        $data['admin'] = new Adminaccounts();
        $req = new Request();
        if($req->posted()) {
            $data['admin']->adminsignup($_POST);
        }
        $this ->adminView('adminviews/adminaccounts/adminsignup', $data);

    }
}
