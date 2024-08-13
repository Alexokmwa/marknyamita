<?php

namespace app\controllers;

defined('ROOTPATH') or exit('Access Denied!');
use app\models\eventmodels\Admineventcategoriesmodel;
use app\core\Admincontroller;
use app\models\Request;
use app\models\Adminsession;
use app\models\eventmodels\Admincreateeventmodel;

/**
 *  Admincreatepost management class
 */
class Admincreateevent extends Admincontroller
{
    public function adminindex()
    {
        $ses = new Adminsession();
        if (!$ses->isLoggedIn()) {
            redirectadmin('Adminsignin');
        }
        $admineventscategory = new Admineventcategoriesmodel();
        $data['row'] = $admineventscategory->findAllcategories();
        $admineventmodel = new Admincreateeventmodel();

        $req = new Request();
        if ($req->posted()) {
            $adminID = $ses->adminuser("adminID");
            $files = $req->files();
            $postData = $req->POST();

            $categoryID = $req->POST("categoryID");
            $categoryname = $req->POST("categoryname");
            $poststatus = 'active';
            $admineventmodel->adminaddevent($postData, $poststatus, $files, $adminID, $categoryID, $categoryname);
        }

        $data['admin'] = $admineventmodel;
        $data['admintitle'] = "Admin Createevent";

        // Render view with data
        $this->adminview('adminviews/adminevents/admincreateevent', $data);
    }
}
