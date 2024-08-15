<?php

namespace app\controllers;

// deny acess to app files and folders access.
defined('ROOTPATH') or exit('Access Denied!');

use app\core\Admincontroller;
use app\models\Adminsession;
use app\models\eventmodels\Admincreateeventmodel;

/**
 * admin Adminpostlist management class
 */
class Adminviewevent extends Admincontroller
{
    public function adminindex($id = null)
    {
        $ses = new Adminsession();
        if(!$ses->isLoggedIn()) {
            redirectadmin('Adminsignin');
        }

        $eventpost = new Admincreateeventmodel();
        $data['eventpost'] = $eventpost->first(['eventID' => $id]);

        $data['admintitle'] = "Admin eventlist";
        // show($data);
        $this ->adminview('adminviews/adminevents/admineventview', $data);
    }
}
