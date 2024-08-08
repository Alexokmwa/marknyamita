<?php

namespace app\controllers;

defined('ROOTPATH') or exit('Access Denied!');

use app\core\Admincontroller;
use app\models\Adminsession;
use app\models\Admincategories;
use app\models\Request;
use app\models\Adminpostsmodel;
use app\models\Adminaccounts;

class Adminpostcategories extends Admincontroller
{
    public function adminindex()
    {

        $ses = new Adminsession();
        if (!$ses->isLoggedIn()) {
            redirectadmin('Adminsignin');
        }
        $adminpostdetail = new Adminaccounts();

        $data['categorycreator'] = $adminpostdetail->findAlladmin();

        $user = new Admincategories();
        $data['row'] = $user->findAllcategories();
        $data['getcategories'] = new Adminpostsmodel();
        $data['admintitle'] = "Admin Categories";
        $countcategorisnumber = new Admincategories();
        $data['countcategorisnumber'] = $countcategorisnumber->countcategories();
        $data['admin'] = new Admincategories();

        $req = new Request();
        if ($req->posted()) {
            $admid = $ses->adminuser("adminID");
            $status = "active";
            $result = $data['admin']->adminaddcategory($req->POST(), $admid,$status);
            echo json_encode($result);
            exit;
        }

        $this->adminview('adminviews/admingeneralpages/adminpost/adminpostcategories', $data);
    }
}
