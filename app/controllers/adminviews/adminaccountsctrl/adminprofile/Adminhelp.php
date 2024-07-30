<?php

namespace app\controllers;

// deny acess to app files and folders access.
defined('ROOTPATH') or exit('Access Denied!');

use app\core\Admincontroller;
use app\models\Adminsession;

/**
 * admin Adminhelp management class
 */
class Adminhelp extends Admincontroller
{
    public function adminindex()
    {
       
        $ses = new Adminsession();
        if(!$ses->isLoggedIn()) {
            redirectadmin('Adminsignin');
        }
        $data['admintitle'] = "Admin help";


        $this ->adminview('adminviews/adminaccounts/adminprofileviews/adminhelp.', $data);
    }
}
