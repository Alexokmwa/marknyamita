<?php

namespace app\controllers;

// deny acess to app files and folders access.
defined('ROOTPATH') or exit('Access Denied!');

use app\core\Admincontroller;
use app\models\Adminsession;
use app\models\Adminpostsmodel;
use app\models\Adminaccounts;

/**
 * admin Adminpostlist management class
 */
class Adminpostlist extends Admincontroller
{
    public function adminindex()
    {
        $ses = new Adminsession();
        if(!$ses->isLoggedIn()) {
            redirectadmin('Adminsignin');
        }
        $userpost = new Adminpostsmodel();
        $data['rowpost'] = $userpost->findAllposts();
        $adminpostdetail = new Adminaccounts();
        $data['row'] = $adminpostdetail->findAlladmin();
        $data['admintitle'] = "Admin Postlist";
        $this ->adminview('adminviews/admingeneralpages/adminpost/adminpostlist', $data);
    }
}
