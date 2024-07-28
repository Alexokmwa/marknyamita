<?php

namespace app\controllers;

// deny acess to app files and folders access.
defined('ROOTPATH') or exit('Access Denied!');

use app\core\Admincontroller;
use app\models\Adminsession;
use app\models\Adminpostsmodel;
use app\models\Adminaccounts;
use app\models\Pageradmin;

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
        $userpost = new Adminpostsmodel();
        // pager
        $limit = 10;
        $pager = new Pageradmin($limit);
        $offset = $pager->offset;
        $userpost->limit = $limit;
        $userpost->offset = $offset;
        $data['limitnumber'] = $limit;
        $data['rowpost'] = $userpost->findAllposts();
        $data['blogpostCount'] = $userpost->countAllposts();
        $adminpostdetail = new Adminaccounts();
        $data['row'] = $adminpostdetail->findAlladmin();
        $data["pager"] = $pager;

        $data['admintitle'] = "Admin Postlist";
        $this ->adminview('adminviews/admingeneralpages/adminpost/adminpostlist', $data);
    }
}
