<?php

namespace app\controllers;

// deny access to app files and folders access.
defined('ROOTPATH') or exit('Access Denied!');

use app\core\Admincontroller;
use app\models\Adminsession;
use app\models\Adminpostsmodel;
use app\models\Admindeletepostmodel;
use app\models\Request;
use app\models\Adminaccounts;

/**
 * Admin delete post management class
 */
class Admindeletepost extends Admincontroller
{
    public function adminindex($id = null)
    {
        $ses = new Adminsession();
        if(!$ses->isLoggedIn()) {
            redirectadmin('Adminsignin');
        }

        $adminAccountsModel = new Adminaccounts();
        $data['rowcreator'] = $adminAccountsModel->findAlladmin();

        $postsModel = new Adminpostsmodel();
        $data['rowpost'] = $rowid = $postsModel->first(['postID' => $id]);

        if (!is_object($data['rowpost'])) {
            redirectadmin('Blog'); // Redirect if post is not found
        }

        $deleteModel = new Admindeletepostmodel();
        $req = new Request();

        if ($req->posted() && isset($_POST['delete_post'])) {
            $postID = $rowid->postID;
            $deleteModel->admineditpost($postID);
        }

        $data['admintitle'] = "Admin Edit Post";

        $this->adminview('adminviews/admingeneralpages/adminpost/Admindeleteviewblog', $data);
    }
}
