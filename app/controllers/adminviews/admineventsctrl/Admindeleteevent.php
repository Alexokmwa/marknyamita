<?php

namespace app\controllers;

defined('ROOTPATH') or exit('Access Denied!');
use app\core\Admincontroller;
use app\models\Adminaccounts;
use app\models\Adminsession;
use app\models\eventmodels\Admincreateeventmodel;
use app\models\eventmodels\Admindleteeventmodel;
use app\models\Request;

/**
 * Admin delete post management class
 */
class Admindeleteevent extends Admincontroller
{
    public function adminindex($id = null)
    {
        $ses = new Adminsession();
        if (!$ses->isLoggedIn()) {
            redirectadmin('Adminsignin');
        }
        $adminAccountsModel = new Adminaccounts;
        $data['rowcreator'] = $adminAccountsModel->findAlladmin();


        $eventpost = new Admincreateeventmodel();
        $data['eventpost'] = $eventpost->first(['eventID' => $id]);

        $deleteModel = new Admindleteeventmodel();
        $req = new Request();

        if ($req->posted()) {
            if(isset($_POST['deleteeventtotrash'])) {
                $eventid = filter_input(INPUT_POST, 'deleteeventtotrashid', FILTER_SANITIZE_NUMBER_INT);
                $result = $deleteModel->deleteeventtotrash($eventid);
                if ($result) {
                    echo 200;
                } else {
                    echo 500;
                }


                exit;
            } elseif(isset($_POST['restoreevent'])) {
                $eventid = filter_input(INPUT_POST, 'restoreeventid', FILTER_SANITIZE_NUMBER_INT);
                $result = $deleteModel->restoreeventfromtrash($eventid);
                if ($result) {
                    echo 200;
                } else {
                    echo 500;
                }


                exit;
            } elseif(isset($_POST['deleteeventtrash'])) {
                $eventid = filter_input(INPUT_POST, 'deleteeventtrashid', FILTER_SANITIZE_NUMBER_INT);
                $result = $deleteModel->admindeleteevent($eventid);
                if ($result) {
                    echo 200;
                } else {
                    echo 500;
                }


                exit;
            }
        }

        $data['admintitle'] = "Admin delete event";

        $this->adminview('adminviews/adminevents/admindeleteevent', $data);
    }
}
