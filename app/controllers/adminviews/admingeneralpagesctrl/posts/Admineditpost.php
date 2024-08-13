<?php

namespace app\controllers;

// deny acess to app files and folders access.
defined('ROOTPATH') or exit('Access Denied!');

use app\core\Admincontroller;
use app\models\Adminsession;
use app\models\Adminpostsmodel;
use app\models\Admineditpostmodal;
use app\models\Request;
use app\models\Admincategories;

/**
 * admin Admineditpost management class
 */
class Admineditpost extends Admincontroller
{
    public function adminindex($id = null)
    {
        $ses = new Adminsession();
        if(!$ses->isLoggedIn()) {
            redirectadmin('Adminsignin');
        }

        $user = new Admincategories();
        $data['row'] = $user->findAllcategories();
        $categoriesModel = new Adminpostsmodel();
        $data['categories'] = $categoriesModel->findAllposts();
        $userpost = new Adminpostsmodel();
        $data['rowpost'] = $rowid = $userpost->first(['postID' => $id]);
        if (!is_object($data['rowpost'])) {
            // Handle case where post is not found, e.g., redirect or show an error message
            redirectadmin('Adminpostlist'); // Example: redirect to posts list
        }
        $adminModel = new Admineditpostmodal();
        $req = new Request();
        if ($req->posted()) {
            $adminID = $ses->adminuser("adminID");
            $files = $req->files();
            $postData = $req->POST();
            $idupdate = $rowid->postID;
            $categoryID = $req->POST("categoryID");
            $categoryname = $req->POST("categoryname");
            $poststatus = 'active';
            $adminModel->admineditpost($idupdate, $postData, $poststatus, $files, $adminID, $categoryID, $categoryname);

        }

        $data['admin'] = $adminModel;
        $data['admintitle'] = "Admin Editpost";

        $this ->adminview('adminviews/admingeneralpages/adminpost/admineditpost', $data);
    }
}
