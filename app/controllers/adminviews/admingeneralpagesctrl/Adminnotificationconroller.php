<?php

namespace app\controllers;

// deny acess to app files and folders access.
defined('ROOTPATH') or exit('Access Denied!');

use app\core\Admincontroller;
use app\models\Adminsession;
use app\models\Request;
use app\models\Blogcomments;
use app\models\Commentnotfcationmodel;
use app\models\Notificationmodel;

/**
 * admin not found management class
 */
class Adminnotificationconroller extends Admincontroller
{
    public function adminindex()
    {
        $data['admintitle'] = "Admin notification";
        $ses = new Adminsession();
        $coomentsitemid = new Blogcomments();
        $data['coomentsitemid'] = $coomentsitemid->findAllcomments();
        if(!$ses->isLoggedIn()) {
            redirectadmin('Adminsignin');
        }
        $notif = new Notificationmodel();
        $notifcomment = new Commentnotfcationmodel();
        $userID = $ses ->adminuser('adminID');

        $data['rows'] = $notif->where(['ownerid' => $userID]);
        $data['rowss'] = $notifcomment->where(['ownerid' => $userID]);
        if($data['rowss']) {
            foreach ($data['rowss'] as $key => $row) {
                $check_user = $notifcomment->getRow("SELECT * FROM users WHERE user_id = :id limit 1", ['id' => $row->userID]);
                $check_postphoto = $notifcomment->getRow("SELECT * FROM  blogposts WHERE postID = :id limit 1", ['id' => $row->Itemid]);
                $data['rowss'][$key]->user_row =  $check_user;
                $data['rowss'][$key]->item_row = $check_postphoto ;
            }

        }
        if($data['rows']) {
            foreach ($data['rows'] as $key => $row) {
                $check_user = $notif->getRow("SELECT * FROM users WHERE user_id = :id limit 1", ['id' => $row->userID]);
                $check_postphoto = $notif->getRow("SELECT * FROM blogposts WHERE postID = :id limit 1", ['id' => $row->Itemid]);
                $data['rows'][$key]->user_row =  $check_user;
                $data['rows'][$key]->item_row = $check_postphoto ;
            }

        }
        // delete notification
        $req = new Request();
        if ($req->posted()) {
            $postData = $req->POST();
            $notif_id = $req->POST("id");

            $formType = $postData['form_type']; // Get the form type

            $notif = new Notificationmodel();
            switch ($formType) {
                case 'delete_notification':
                    # code...
                    $notif->delete($notif_id);
                    $ses = new Adminsession();

                    $ses->set('comment_success', 'like notification deleted successfully');
                    redirectadmin("Adminnotificationconroller");
                    break;
                case 'commentdelete_notification':
                    # code...
                    $notifcomment->delete($notif_id);
                    $ses = new Adminsession();

                    $ses->set('comment_success', 'comment notification deleted successfully');
                    redirectadmin("Adminnotificationconroller");
                    break;
            }

        }


        $this->adminView('adminviews/adminnotification', $data);

        // echo  "404 error page not found";
    }
}
