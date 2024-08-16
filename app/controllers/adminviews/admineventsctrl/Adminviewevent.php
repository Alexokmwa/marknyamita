<?php

namespace app\controllers;

// deny acess to app files and folders access.
defined('ROOTPATH') or exit('Access Denied!');

use app\core\Admincontroller;
use app\models\Adminsession;
use app\models\eventmodels\Admincreateeventmodel;
use app\models\Notificationmodel;

/**
 * admin Adminpostlist management class
 */
class Adminviewevent extends Admincontroller
{
    public function adminindex($id = null)
    {
        $eventpostnotification = new Admincreateeventmodel();

        $ses = new Adminsession();
        if(!$ses->isLoggedIn()) {
            redirectadmin('Adminsignin');
        }
        if(!empty($_GET['seen']) && !empty($_GET['notif'])) {
            $notif_id = (int)$_GET['notif'];
            $notif = new Notificationmodel();
            $notif->update($notif_id, ['seen' => 1]);

        }
        if(!empty($_GET['itemid'])) {
            $adminID = $ses->adminuser('adminID');
            $itemid = $_GET['itemid'];
            $item_row = $eventpostnotification->getRow('SELECT adminID FROM blogposts WHERE adminID = :id', ['id' => $adminID]);
            if ($item_row) {
                $arr['ownerid'] = 0;
                $arr['userID'] = $item_row->adminID;
                $arr['Itemid'] = $itemid ;
                $arr['type'] = 'eventpost';
                if ($arr['ownerid'] != $arr['userID']) {
                    eventaddnotifications($arr);
                    $ses = new Adminsession();

                    $ses->set('comment_success', 'event notification sent successfully');
                }
            }
        }
        $eventpost = new Admincreateeventmodel();
        $data['eventpost'] = $eventpost->first(['eventID' => $id]);

        $data['admintitle'] = "Admin eventlist";
        // show($data);
        $this ->adminview('adminviews/adminevents/admineventview', $data);
    }
}
