<?php

namespace app\controllers;

// deny acess to app files and folders access.
defined('ROOTPATH') or exit('Access Denied!');

use app\core\Admincontroller;
use app\models\Adminsession;
use app\models\Adminpostsmodel;
use app\models\Adminaccounts;

/**
 * admin Adminviewblog management class
 */
class Adminviewblog extends Admincontroller
{
    public function adminindex($id = null)
    {
        $ses = new Adminsession();
        if(!$ses->isLoggedIn()) {
            redirectadmin('Adminsignin');
        }
        $adminpostdetail = new Adminaccounts();
        $data['rowcreator'] = $adminpostdetail->findAlladmin();
        $userpost = new Adminpostsmodel();

        $data['rowpost'] =  $userpost->first(['postID' => $id]);
        if (!is_object($data['rowpost'])) {
            // Handle case where post is not found, e.g., redirect or show an error message
            redirectadmin('Blog'); // Example: redirect to posts list
        }

        // show($data);
        $this ->adminview('adminviews/admingeneralpages/adminpost/Adminviewblog', $data);
    }
}
