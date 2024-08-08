<?php

namespace app\controllers;

defined('ROOTPATH') or exit('Access Denied!');
use Exception;
use app\core\Admincontroller;
use app\models\Adminsession;
use app\models\Adminpostsmodel;
use app\models\Request;
use app\models\Adminaccounts;
use app\models\Admindeletecategorymodel;

/**
 * Admin delete post management class
 */
class Admindeletecategory extends Admincontroller
{
    public function adminindex($id = null)
    {
        $ses = new Adminsession();
        if (!$ses->isLoggedIn()) {
            redirectadmin('Adminsignin');
        }

        $adminAccountsModel = new Adminaccounts();
        $data['rowcreator'] = $adminAccountsModel->findAlladmin();

        $postsModel = new Adminpostsmodel();
        $data['rowpost'] = $rowid = $postsModel->first(['postID' => $id]);

        $deleteModelcategory = new Admindeletecategorymodel();
        $req = new Request();
        if ($req->posted()) {
            if(isset($_POST['deletetrash'])) {
                $categoryID = filter_input(INPUT_POST, 'trashdeleteid', FILTER_SANITIZE_NUMBER_INT);

                // Handle delete action
                $result = $deleteModelcategory->addtotrashcategory($categoryID);
                echo $result ? 200 : 500;
                exit;
            } elseif (isset($_POST['restorecategory'])) {
                $categoryID = filter_input(INPUT_POST, 'restorecategoryid', FILTER_SANITIZE_NUMBER_INT);
                // Handle restore action
                $result = $deleteModelcategory->restorecategory($categoryID);
                echo $result ? 200 : 500;
                exit;
            } elseif(isset($_POST['deletecategorytrash'])) {
                $categoryID = filter_input(INPUT_POST, 'deletecategorytrashid', FILTER_SANITIZE_NUMBER_INT);
                $result = $deleteModelcategory->deletepostcategory($categoryID);
                echo $result ? 200 : 500;
                exit;
            }
        }

        $data['admintitle'] = "Admin delete category";

        $this->adminview('adminviews/admingeneralpages/adminpost/adminpostcategories', $data);
    }
}
