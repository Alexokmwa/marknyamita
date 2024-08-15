<?php

namespace app\controllers;

defined('ROOTPATH') or exit('Access Denied!');
use app\core\Admincontroller;
use app\models\Adminaccounts;
use app\models\Adminsession;
use app\models\Request;
use app\models\eventmodels\Admindeleteeventcategorymodel;

/**
 * Admin delete event management class
 */
class Admindeleteeventcategory extends Admincontroller
{
    public function adminindex()
    {
        $ses = new Adminsession();
        if (!$ses->isLoggedIn()) {
            redirectadmin('Adminsignin');
        }

        $adminAccountsModel = new Adminaccounts;
        $data['rowcreator'] = $adminAccountsModel->findAlladmin();



        $deleteModelcategory = new Admindeleteeventcategorymodel();
        $req = new Request();
        if ($req->posted()) {
            if(isset($_POST['deletecategorytotrash'])) {
                $categoryID = filter_input(INPUT_POST, 'deletecategorytotrashid', FILTER_SANITIZE_NUMBER_INT);

                // Handle delete action
                $result = $deleteModelcategory->addeventtotrashcategory($categoryID);
                echo $result ? 200 : 500;
                exit;
            } elseif (isset($_POST['restoreeventcategory'])) {
                $categoryID = filter_input(INPUT_POST, 'restoreeventcategoryid', FILTER_SANITIZE_NUMBER_INT);
                // Handle restore action
                $result = $deleteModelcategory->restoreeventcategory($categoryID);
                echo $result ? 200 : 500;
                exit;
            } elseif(isset($_POST['deleteeventcategorytrash'])) {
                $categoryID = filter_input(INPUT_POST, 'deleteeventcategorytrashid', FILTER_SANITIZE_NUMBER_INT);
                $result = $deleteModelcategory->deleteeventcategory($categoryID);
                echo $result ? 200 : 500;
                exit;
            }
        }

        $data['admintitle'] = "Admin delete event category";

        $this->adminview('adminviews/adminevents/admineventcategories', $data);
    }
}
