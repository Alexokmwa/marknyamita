<?php

namespace app\controllers;

// deny acess to app files and folders access.
defined('ROOTPATH') or exit('Access Denied!');

use app\core\Admincontroller;
use app\models\Adminsession;

/**
 * admin Adminresetpassword management class
 */
class Adminresetpassword extends Admincontroller
{
    public function adminindex()
    {
       
        $ses = new Adminsession();
        if(!$ses->isLoggedIn()) {
            redirectadmin('Adminsignin');
        }
        $data['admintitle'] = "Admin resetpassword";


        $this ->adminview('', $data);
    }
}
