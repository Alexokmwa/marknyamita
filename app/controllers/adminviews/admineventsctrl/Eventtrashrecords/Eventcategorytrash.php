<?php

namespace app\controllers;

defined('ROOTPATH') or exit('Access Denied!');

use app\core\Admincontroller;
use app\models\Adminsession;
use app\models\Adminpostsmodel;
use app\models\Admincategories;
use app\models\eventmodels\Admineventcategoriesmodel;

/**
 * Admin delete post management class
 */
class Eventcategorytrash extends Admincontroller
{
    public function adminindex()
    {
        $ses = new Adminsession();
        if (!$ses->isLoggedIn()) {
            redirectadmin('Adminsignin');
        }
        $user = new Admineventcategoriesmodel;
        $data['row'] = $user->findAllcategories();
        
         $data['admintitle'] = "Admin trash category";

        $this->adminview('adminviews/adminevents/eventtrashbinpages/eventcategorytrash', $data);
    }
}
