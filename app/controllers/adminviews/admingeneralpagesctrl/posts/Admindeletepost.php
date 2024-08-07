<?php

namespace app\controllers;

defined('ROOTPATH') or exit('Access Denied!');
use Exception;
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
        if (!$ses->isLoggedIn()) {
            redirectadmin('Adminsignin');
        }

        $adminAccountsModel = new Adminaccounts();
        $data['rowcreator'] = $adminAccountsModel->findAlladmin();

        $postsModel = new Adminpostsmodel();
        $data['rowpost'] = $rowid = $postsModel->first(['postID' => $id]);

        $deleteModel = new Admindeletepostmodel();
        $req = new Request();

        if ($req->posted()) {
            if(isset($_POST['deleteposttotrash'])) {
                $postID = filter_input(INPUT_POST, 'deleteposttotrashid', FILTER_SANITIZE_NUMBER_INT);
                $result = $deleteModel->deletePosttotrash($postID);
                if ($result) {
                    echo 200;
                } else {
                    echo 500;
                }


                exit;
            } elseif(isset($_POST['restorepost'])) {
                $postID = filter_input(INPUT_POST, 'restorepostid', FILTER_SANITIZE_NUMBER_INT);
                $result = $deleteModel->restorepostfromtrash($postID);
                if ($result) {
                    echo 200;
                } else {
                    echo 500;
                }


                exit;
            }elseif(isset($_POST['deleteposttrash'])) {
                $postID = filter_input(INPUT_POST, 'deleteposttrashid', FILTER_SANITIZE_NUMBER_INT);
                $result = $deleteModel->deletePost($postID);
                if ($result) {
                    echo 200;
                } else {
                    echo 500;
                }


                exit;
            }
        }

        $data['admintitle'] = "Admin delete Post";

        $this->adminview('adminviews/admingeneralpages/adminpost/Admindeleteviewblog', $data);
    }
}
