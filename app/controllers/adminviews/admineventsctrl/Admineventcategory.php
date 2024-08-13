<?php

namespace app\controllers;

defined('ROOTPATH') or exit('Access Denied!');

use app\core\Admincontroller;
use app\models\Adminsession;
use app\models\eventmodels\Admineventcategoriesmodel;
use app\models\Request;
use app\models\eventmodels\Admincreateeventmodel;
use app\models\Adminaccounts;

class Admineventcategory extends Admincontroller
{
    public function adminindex()
    {

        $ses = new Adminsession();
        if (!$ses->isLoggedIn()) {
            redirectadmin('Adminsignin');
        }
        $adminpostdetail = new Adminaccounts();

        $data['categorycreator'] = $adminpostdetail->findAlladmin();

        $eventcategory = new Admineventcategoriesmodel();
        $data['row'] = $eventcategory->findAllcategories();
        $data['getcategories'] = new Admincreateeventmodel();
        $data['admintitle'] = "Admin Categories";
        $countcategorisnumber = new Admineventcategoriesmodel();
        $data['countcategorisnumber'] = $countcategorisnumber->countcategories();
        $data['admin'] = new Admineventcategoriesmodel();

        $req = new Request();
        if ($req->posted()) {
            $admid = $ses->adminuser("adminID");
            $status = "active";
            $result = $data['admin']->adminaddeventcategory($req->POST(), $admid, $status);
            echo json_encode($result);
            exit;
        }

        $this->adminview('adminviews/adminevents/admineventcategories', $data);
    }
}
