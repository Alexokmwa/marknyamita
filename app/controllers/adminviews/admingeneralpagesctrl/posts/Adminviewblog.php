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
if(!empty($_GET['seen']) && !empty($_GET['notif'])){
    $notif_id = (int)$_GET['notif'];
    $notif = new Notificationmodel();
    $notif->update($notif_id,['seen'=>1]);

}
        // show($notif_id);
        $this ->adminview('adminviews/admingeneralpages/adminpost/Adminviewblog', $data);
    }
}
