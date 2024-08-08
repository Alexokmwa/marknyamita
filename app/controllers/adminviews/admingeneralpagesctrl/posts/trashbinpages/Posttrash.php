<?php

namespace app\controllers;

defined('ROOTPATH') or exit('Access Denied!');
use Exception;
use app\core\Admincontroller;
use app\models\Adminsession;
use app\models\Adminpostsmodel;
use app\models\Admincategories;

/**
 * Admin delete post management class
 */
class Posttrash extends Admincontroller
{
    public function adminindex()
    {
        $ses = new Adminsession();
        if (!$ses->isLoggedIn()) {
            redirectadmin('Adminsignin');
        }
        $userposts = new Adminpostsmodel();
        $data['row'] = $userposts->findAllposts();
        $data['getcategories'] = new Adminpostsmodel();
        $data['admintitle'] = "Admin Categories";
        $data['admin'] = new Admincategories();
        $data['admintitle'] = "Admin trash category";

        $this->adminview('adminviews/admingeneralpages/adminpost/trashbinpages/adminposttrash', $data);
    }
}
