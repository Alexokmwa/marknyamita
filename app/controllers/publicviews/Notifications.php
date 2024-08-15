<?php

namespace app\controllers;

// deny acess to app files and folders access.
defined('ROOTPATH') or exit('Access Denied!');
use app\core\Controller;
use app\models\Adminsession;
use app\models\Notificationmodel;
use app\models\Request;

class Notifications extends Controller
{
    public function index()
    {
        $notif = new Notificationmodel();
        $ses = new Adminsession();
        // if(!$ses->isLoggedIn()) {
        //     redirectadmin('Adminsignin');
        // }
        $userID = $ses ->adminuser('adminID');

        $data['rowspublic'] = $notif->where(['ownerid' => 0]);
        if($data['rowspublic']) {
            foreach ($data['rowspublic'] as $key => $row) {
                $check_user = $notif->getRow("SELECT * FROM admins WHERE adminID = :id limit 1", ['id' => $row->userID]);
                $check_postphoto = $notif->getRow("SELECT * FROM blogposts WHERE adminID = :id limit 1", ['id' => $row->userID]);
                $check_postphoto = $notif->getRow("SELECT * FROM blogposts WHERE postID = :id limit 1", ['id' => $row->Itemid]);
                $check_postphotoevent = $notif->getRow("SELECT * FROM events WHERE eventID = :id limit 1", ['id' => $row->Itemid]);
                $data['rowspublic'][$key]->user_row =  $check_user;
                $data['rowspublic'][$key]->item_rowblog = $check_postphoto ;
                $data['rowspublic'][$key]->item_rowevent = $check_postphotoevent ;
            }

        }
        // delete notification
        $req = new Request();
        if ($req->posted()) {
            $postData = $req->POST();
            $notif_id= $req->POST("id");

            $formType = $postData['form_type']; // Get the form type

            $notif = new Notificationmodel();
            switch ($formType) {
                case 'delete_notification':
                    # code...
                    $notif->delete($notif_id);
                    break;
            }
            $ses = new Adminsession();

            $ses->set('comment_success', 'notification deleted successfully');
       redirect("Notifications");

        }
        // show();
        $this->view('publicviews/notifications', $data);

    }
}
