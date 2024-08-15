<?php

namespace app\controllers;

use app\models\eventmodels\Admindeleteeventcategorymodel;

defined('ROOTPATH') or exit('Access Denied!');
use Exception;
use app\core\Admincontroller;
use app\models\Adminsession;
use app\models\eventmodels\Admincreateeventmodel;

use app\models\Admincategories;

/**
 * Admin delete post management class
 */
class Eventtrash extends Admincontroller
{
    public function adminindex()
    {
        $ses = new Adminsession();
        if (!$ses->isLoggedIn()) {
            redirectadmin('Adminsignin');
        }
        $eventtrash = new Admincreateeventmodel();
        $data['row'] = $eventtrash->findAllevents();

        $data['admintitle'] = "Admin trash category";

        $this->adminview('adminviews/adminevents/eventtrashbinpages/admineventtrash', $data);
    }
}
