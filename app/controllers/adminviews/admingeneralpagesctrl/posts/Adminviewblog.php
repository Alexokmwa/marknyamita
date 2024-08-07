<?php

namespace app\controllers;

use app\models\Notificationmodel;

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
        if(!empty($_GET['seen']) && !empty($_GET['notif'])) {
            $notif_id = (int)$_GET['notif'];
            $notif = new Notificationmodel();
            $notif->update($notif_id, ['seen' => 1]);

        }
        if(!empty($_GET['itemid'])) {
            $adminID = $ses->adminuser('adminID');
            $itemid = $_GET['itemid'];
            $item_row = $userpost->getRow('SELECT adminID FROM blogposts WHERE adminID = :id', ['id' => $adminID]);
            if ($item_row) {
                $arr['ownerid'] = 0;
                $arr['userID'] = $item_row->adminID;
                $arr['Itemid'] = $itemid ;
                $arr['type'] = 'blogpost';
                if ($arr['ownerid'] != $arr['userID']) {
                    addnotifications($arr);
                    $ses = new Adminsession();

                    $ses->set('comment_success', 'notification sent successfully');
                }
            }
        }
        // show($notif_id);
        $this ->adminview('adminviews/admingeneralpages/adminpost/Adminviewblog', $data);
    }
}
