<?php

namespace app\controllers;

// deny acess to app files and folders access.
defined('ROOTPATH') or exit('Access Denied!');

use app\core\Admincontroller;
use app\models\Adminsession;
use app\models\eventmodels\Admincreateeventmodel;
use app\models\Adminaccounts;
use app\models\Pageradmin;
use app\models\eventmodels\Admineventcategoriesmodel;

/**
 * admin Adminpostlist management class
 */
class Admineventlist extends Admincontroller
{
    public function adminindex()
    {
        $ses = new Adminsession();
        if(!$ses->isLoggedIn()) {
            redirectadmin('Adminsignin');
        }
        // category data
        $eventcategories = new Admineventcategoriesmodel();
        $data['rowcategories'] = $eventcategories->findAllcategories();
        $eventpost = new Admincreateeventmodel();
        $eventpost = new Admincreateeventmodel();
        // pager
        $limit = 10;
        $pager = new Pageradmin($limit);
        $offset = $pager->offset;
        $eventpost->limit = $limit;
        $eventpost->offset = $offset;
        $data['limitnumber'] = $limit;
        $data['rowpost'] = $eventpost->findAllevents();
        $data['eventCount'] = $eventpost->countAllposts();
        $adminpostdetail = new Adminaccounts();
        $data['row'] = $adminpostdetail->findAlladmin();
        $data["pager"] = $pager;

        $data['admintitle'] = "Admin eventlist";
        // show($data);
        $this ->adminview('adminviews/adminevents/admineventlist', $data);
    }
}
