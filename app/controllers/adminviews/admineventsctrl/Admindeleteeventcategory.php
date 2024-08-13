<?php

namespace app\controllers;

defined('ROOTPATH') or exit('Access Denied!');
use Exception;
use app\core\Admincontroller;
use app\models\Adminsession;
use app\models\Request;
use app\models\eventmodels\Admindeleteeventcategorymodel;

/**
 * Admin delete post management class
 */
class Admindeleteeventcategorytotrash extends Admincontroller
{
    public function adminindex()
    {
        $ses = new Adminsession();
        if (!$ses->isLoggedIn()) {
            redirectadmin('Adminsignin');
        }





        $deleteModelcategory = new Admindeleteeventcategorymodel();
        $req = new Request();
        if ($req->posted()) {
            if(isset($_POST['deletetrasheventcategory'])) {
                $categoryID = filter_input(INPUT_POST, 'deletetrasheventcategoryid', FILTER_SANITIZE_NUMBER_INT);

                // Handle delete action
                $result = $deleteModelcategory->addeventtotrashcategory($categoryID);
                echo $result ? 200 : 500;
                exit;
            } elseif (isset($_POST['restorecategory'])) {
                $categoryID = filter_input(INPUT_POST, 'restorecategoryid', FILTER_SANITIZE_NUMBER_INT);
                // Handle restore action
                $result = $deleteModelcategory->restoreeventcategory($categoryID);
                echo $result ? 200 : 500;
                exit;
            } elseif(isset($_POST['deletecategorytrash'])) {
                $categoryID = filter_input(INPUT_POST, 'deletecategorytrashid', FILTER_SANITIZE_NUMBER_INT);
                $result = $deleteModelcategory->deleteeventcategory($categoryID);
                echo $result ? 200 : 500;
                exit;
            }
        }

        $data['admintitle'] = "Admin delete event category";

        $this->adminview('adminviews/adminevents/admineventcategories', $data);
    }
}
