<?php

namespace app\controllers;

defined('ROOTPATH') or exit('Access Denied!');
use app\models\Admincategories;
use app\core\Admincontroller;
use app\models\Request;
use app\models\Adminsession;
use app\models\Adminpostsmodel;

/**
 *  Admincreatepost management class
 */
class Admincreatepost extends Admincontroller
{
    public function adminindex()
    {
        $ses = new Adminsession();
        if (!$ses->isLoggedIn()) {
            redirectadmin('Adminsignin');
        }
        $user = new Admincategories();
        $data['row'] = $user->findAllcategories();
        $adminModel = new Adminpostsmodel();
        $getcategoryid = new Admincategories();

        $req = new Request();
        if ($req->posted()) {
            $adminID = $ses->adminuser("adminID");
            $files = $req->files();
            $postData = $req->POST();
            $postDataquil = $req->POST("postbody");
            
            $categoryID = $req->POST("categoryID");
            $categoryname = $req->POST("categoryname");
            // Ensure adminID is set in POST data
            $postData["adminID"] = $adminID;
            $postData["postbody"] = $postDataquil; // Store plain text content
            $adminModel->adminaddpost($postData, $files, $adminID, $categoryID,$categoryname);
            show($postData);
        }

        $data['admin'] = $adminModel;
        $data['admintitle'] = "Admin Createpost";

        // Render view with data
        $this->adminview('adminviews/admingeneralpages/adminpost/admincreatepost', $data);
    }
}
