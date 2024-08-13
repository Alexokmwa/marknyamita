<?php

namespace app\controllers;

// deny acess to app files and folders access.
defined('ROOTPATH') or exit('Access Denied!');

use app\core\Admincontroller;
use app\models\Adminsession;
use app\models\eventmodels\Admincreateeventmodel;
use app\models\eventmodels\Adminediteventmodel;
use app\models\Request;
use app\models\eventmodels\Admineventcategoriesmodel;

/**
 * admin Admineditpost management class
 */
class Admineditevent extends Admincontroller
{
    public function adminindex($id = null)
    {
        $ses = new Adminsession();
        if(!$ses->isLoggedIn()) {
            redirectadmin('Adminsignin');
        }

        $user = new Admineventcategoriesmodel();
        $data['row'] = $user->findAllcategories();
        $categoriesModel = new Admincreateeventmodel();
        $data['categories'] = $categoriesModel->findAllevents();
        $userpost = new Admincreateeventmodel();
        $data['rowpost'] = $rowid = $userpost->first(['eventID' => $id]);
        if (!is_object($data['rowpost'])) {
            // Handle case where post is not found, e.g., redirect or show an error message
            redirectadmin('Admineventlist'); // Example: redirect to posts list
        }
        $adminModel = new Adminediteventmodel();
        $req = new Request();
        if ($req->posted()) {
            $adminID = $ses->adminuser("adminID");
            $files = $req->files();
            $postData = $req->POST();
            $idupdate = $rowid->eventID;
            $categoryID = $req->POST("categoryID");
            $categoryname = $req->POST("categoryname");
            $poststatus = 'active';
            $adminModel->admineditevent($idupdate, $postData, $poststatus, $files, $adminID, $categoryID, $categoryname);

        }

        $data['admin'] = $adminModel;
        $data['admintitle'] = "Admin Event";

        $this ->adminview('adminviews/adminevents/admineditevent', $data);
    }
}
